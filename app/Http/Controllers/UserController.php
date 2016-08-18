<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Category;

class UserController extends Controller {

	function get_child_categories()
	{
		$categories = Category::all();
		$cats = array();
		
		foreach ($categories->where('level', '1') as $main_cat) {
            $item = collect();
            $item->put('category', $main_cat);
            $item->put('sub_category', $categories->where('parent_id', $main_cat->id));
            array_push($cats, $item);
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
        return \View::make('user.index', ["products"=>Product::all()->random(5), 
			"categories"=>$this->get_child_categories(),
			"section"=>1]);
	}

	/**
	 * Show About Us page 
	 *
	 * @return Response
	 */
	public function about()
	{
        return \View::make('user.aboutus', ["products"=>Product::all(),
        	"categories"=>$this->get_child_categories(),
        	"section"=>2]);
	}

	/**
	 * Show Careers Page
	 *
	 * @return Response
	 */
    public function careers()
	{
        return \View::make('user.careers', ["products"=>Product::all(), 
        	"categories"=>$this->get_child_categories(),
        	"section"=>4]);
	}

	/**
	 * Show the all products page
	 *
	 * @return Response
	 */
	public function showProducts()
	{
        return \View::make('user.allproducts', ["categories"=>$this->get_child_categories(),
			"section"=>3]);
	}

	/**
	 * Show details of one product
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showProduct($id)
	{
        $product = Product::find($id);
        if (empty($product))
            abort(404);
        $category = Category::find($product->category_id);
        $parent_cat = Category::find($category->parent_id);
        return \View::make('user.product', [
        	"product"=>$product,
        	"category"=>$category,
        	"parent_cat"=>$parent_cat,
        	"categories"=>$this->get_child_categories(),
            "section"=>3
        ]);
	}

	/**
	 * Show products in category
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showCategory($id)
	{
		$products = Product::where('category_id', '=', $id)->get();
        return \View::make('user.category', ["products"=>$products, 
        	"categories"=>$this->get_child_categories(),
        	"section"=>3]);
	}

	/**
	 * Send email
	 *
	 * @return Response
	 */
	public function email(Request $request)
	{
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $msg = $request->message;

        \Mail::send('emails.contact', compact("name", "email", "subject", "msg"), function($message) use ($name, $email)
        {
            $message->to(env('MAIL_USERNAME'), 'Tuffix Admin')
                ->subject("New User Query from " . $name . " (" . $email . ")");
        });

        return \View::make('user.mailsent', [ 
        	"categories"=>$this->get_child_categories(),
            "section"=>3
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
