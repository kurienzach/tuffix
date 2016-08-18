<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller {
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
			$selects = collect();
			$selects->put('name', $main_cat->name);
			$selects->put('id', $main_cat->id);
			array_push($cats, $selects);

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
     * Display category home page
     *
     * @return Response
     */
    public function home()
    {
        $categories = Category::all();
        return \View::make('categories', ["categories"=>$categories, "section"=>1 ]);
    }    

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return view('category_add',  ['categories' => $this->get_child_categories(),
                "section"=>1]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
        // Check if request if for update or create new
        if ($request->has('id'))
        {
            $new_category = Category::find($request->input('id'));
            if (empty($new_category))
                abort(404);
            
            // Check if its a delete request
            if ($request->has('del_button'))
            {
                $new_category->delete(); 
                return redirect(url('/admin/categories'));
            }
            $is_update = True;
        }
        else
        {
            $new_category = new Category;
            $is_update = False;
        }

        // ************************** All  validations
        $messages = [];
        // Name 
        if (empty($request->input('name')))
            array_push($messages, 'Name field is required');
        if (strlen($request->input('name')) > 199)
            array_push($messages, 'Name field cannot be more than 200 characters');

        // Parent ID related
        // [TODO] Top level categories must have an image
		$parent_id = $request->input('parent_id');
        if ($parent_id != 0) 
        {
			$parent = Category::find($parent_id);
			// Return error if parent is at level 3
			if ($parent->level == 3) 
			{
			    array_push($messages, 'Only 3 levels of Subcategories can be created');
			}

            // ***** If update ensure that the new parent is not child of the product
            // In other world a parent category cannot be edited to set the parent category
            // as its own subcategory
            if ($is_update)
            {
                $temp_parent = $parent;

                if ($temp_parent->id == $new_category->id)
                        array_push($messages,'Parent category selected is same as current category');

                do {
                    if ($temp_parent->parent_id == $new_category->id) 
                        array_push($messages,'Cannot select a subcategory as its own parent');
                        break;
                    $temp_parent = Category::find($temp_parent->parent_id);                
                } while ($temp_parent);
            }
        }

        // Image related
        if ($request->hasFile('img_url'))
        {
            $photo = $request->file('img_url');

            if (!$photo->isValid() || 
                !in_array(strtolower($photo->getClientOriginalExtension()), ["jpg", "jpeg", "gif", "png"]) || 
                !in_array(strtolower($photo->guessClientExtension()), ["jpg", "jpeg", "gif", "png"]))
            {
                // Image is not of correct extension
				array_push($messages,'Invalid Image File. Please upload a jpg, gif or png image!!!');
            }
        }

        if (!empty($messages))
        {
            return redirect()->back()->withErrors($messages)->withInput();
        }


        // Fill out straighforward fields
		$new_category->name = $request->input('name');
		$new_category->parent_id = $request->input('parent_id');
        $new_category->description = $request->input('description');

        // Logic for calculating level from level of parent_id
		if ($parent_id==0)
        {
            //This is a top level category
			$new_category->level=1;
		}
		else
		{
			$new_category->level = $parent->level + 1;
		}

        // Image Upload
        if ($request->hasFile('img_url'))
        {
            // Delete current image file for updation
            if ($is_update && !empty( $new_category->img_url ))
               unlink(public_path() . '/img/categoryimg/' . $new_category->img_url);

            $new_category->img_url = $photo->getClientOriginalName();
            $photo->move(public_path().'/img/categoryimg', $photo->getClientOriginalName());
        }
		
        $new_category->save();
        return redirect(url( '/admin/categories' ));
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
        $old_category = Category::find($id);
        if (empty($old_category))
        {
            abort(404);
        }
        return view('category_add',  ['old_category' => $old_category, 
            'categories' => $this->get_child_categories(),
            "section"=>1]);
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
