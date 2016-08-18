<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use App\Category;

class ProductController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	function get_child_categories()
	{
		$categories = Category::all();
		$cats = array();
		
		foreach ($categories->where('level', '1') as $main_cat) {
			//$selects = collect();
			//$selects->put('name', $main_cat->name);
			//$selects->put('id', $main_cat->id);
			//array_push($cats, $selects);

			foreach ($categories->where('parent_id', $main_cat->id) as $sub_cat) {
                $selects = collect();
                $selects->put('name', $main_cat->name . "-->" . $sub_cat->name);
                $selects->put('id', $sub_cat->id);
                array_push($cats, $selects);

				foreach ($categories->where('parent_id', $sub_cat->id) as $sub_sub_cat) {
					$selects = collect();
					$selects->put('name', $main_cat->name . "-->" . $sub_cat->name . "-->" . $sub_sub_cat->name);
					$selects->put('id', $sub_sub_cat->id);
					array_push($cats, $selects);
				}
			}
		}
		return $cats;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('products', ['products'=>Product::all(), "section"=>0]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return \View::make('product_add', ['categories'=>$this->get_child_categories(),
                "section"=>0]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        // Check if request if for update or create new
        if ($request->has('id'))
        {
            $new_product = Product::find($request->input('id'));
            if (empty($new_product))
                abort(404);
            
            // Check if its a delete request
            if ($request->has('del_button'))
            {
                $new_product->delete(); 
                return redirect(url( '/admin/products' ));
            }
            $is_update = True;
        }
        else
        {
            $new_product = new Product;
            $is_update = False;
        }

        // ************* All Validations
        $messages = [];
        // Product Name
        if (empty($request->input('product_name')))
            array_push($messages, 'Product Name field is required');
        if (strlen($request->input('product_name')) > 254)
            array_push($messages, 'Product Name field cannot be more than 255 characters');

        //Category ID
        if (empty($request->input('category_id')))
            array_push($messages, 'Category ID field is required');

        //Product Images
        $filename = [];
        if ($request->hasFile('product_img'))
        {
            $files = $request->file('product_img');
            foreach ($files as $file) 
            {
                if (!$file->isValid() || 
                    !in_array(strtolower($file->getClientOriginalExtension()), ["jpg", "jpeg", "gif", "png"]) || 
                    !in_array(strtolower($file->guessClientExtension()), ["jpg", "jpeg", "gif", "png"]))
                {
                    // Image is not of correct extension
                    array_push($messages,'Invalid Image File. Please upload a jpg, gif or png image!!!');
                    break;
                }
            }
        }

        // Product Attributes
        if (strlen($request->input('attr1_name')) > 254 || 
            strlen($request->input('attr1_value')) > 254 ||
            strlen($request->input('attr2_name')) > 254 ||
            strlen($request->input('attr2_value')) > 254)
        {
            array_push($messages, 'Attributes field cannot be more than 255 characters');
        }

        if (!empty($messages))
        {
            return redirect()->back()->withErrors($messages)->withInput();
        }

        // ***************** Database acces code 
        $new_product->product_name = $request->input('product_name');
        $new_product->description = $request->input('product_desc');
        $new_product->specification = $request->input('product_spec');
        $new_product->category_id = $request->input('category_id');
        $new_product->attr1_name = $request->input('attr1_name');
        $new_product->attr1_value = $request->input('attr1_value');
        $new_product->attr2_name = $request->input('attr2_name');
        $new_product->attr2_value = $request->input('attr2_value');

        $images = [];
        if ($request->hasFile('product_img'))
        {
            foreach($files as $file)
            {
                $file->move(public_path().'/img/productimg', $file->getClientOriginalName());
                $new_product_img = new ProductImage;
                $new_product_img->img_url = $file->getClientOriginalName();
                array_push($images, $new_product_img);
            }

            if ($is_update)
                $new_product->images()->delete();
        }

        $new_product->save();

        if (!empty($images))
            $new_product->images()->saveMany($images);

        return redirect(url( '/admin/products' ));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $old_product = Product::find($id);
        if (empty($old_product))
        {
            abort(404);
        }
        return \View::make('product_add', ['old_product'=>$old_product,
            'categories'=>$this->get_child_categories(),
            'section'=>0]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
