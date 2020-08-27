<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Model\Category;
use App\Model\Section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller {

    private $result = false;
    private $message = false;
    private $details = false;
    private $value = false;
    private $total_row = false;
    private $validator_error = false;

    public function categories() {
        Session::put('page', 'categories');
//        $categories = Category::with(['section'=>  function($query){
//            $query->select('id','name');
//        }])->get();
        $categories = Category::with(['section','parentcategory'])->get();
        //$categories = json_decode(json_encode($categories), true);   
        //return $categories;
        return view('Admin-view.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            Category::where('id', $data['category_id'])->update(['status' => $data['status']]);
            $this->result = true;
            $this->message = trans('messages.2');
        } else {
            $this->result = FALSE;
            $this->message = trans('messages.3');
        }
        return Response::make([
                    'result' => $this->result,
                    'message' => $this->message
        ]);
    }

    public function addEditCategory(Request $request, $id = null) {
        if ($id == "") {
            $title = "Add Category";
            $category = new Category();
        } else {
            $title = "Edit Category";
        }
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                        'category_name' => 'required',
                        'parent_id' => 'required|numeric',
                        "section_id" => 'required',
                        "category_discount" => 'required|numeric',
                        "category_description" => 'required',
                        "category_url" => 'required',
                        "meta_title" => 'required',
                        "meta_description" => 'required',
                        "meta_keywords" => 'required',
                        "category_image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            if ($request->hasFile('category_image')) {
                $image_temp = $request->file('category_image');
                if ($image_temp->isValid()) {
                    /* get  Image Extension */
                    $extension = $image_temp->getClientOriginalExtension();
                    /* get  New image name */
                    $image_name = rand(111, 999999) . '.' . $extension;
                    $destinationPath = public_path() . trans('labels.5') . '/category_images/';
                    $imagePath = $destinationPath . $image_name;
                    /* Upload the Image */
                    Image::make($image_temp)->resize(300, 400)->save($imagePath);
                } elseif (!empty($data['category_image'])) {
                    $image_name = $data['category_image'];
                } else {
                    $image_name = "";
                }
            }
            $data = $request->all();
            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_name = $data['category_name'];
            $category->category_image = $image_name;
            $category->category_discount = $data['category_discount'];
            $category->description = $data['category_description'];
            $category->url = $data['category_url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_descriotion = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $result = $category->save();
            if ($result == true) {
                return redirect('admin/categories')->with('success_message', trans('messages.5'));
            } else {
                return redirect()->back()->with('success', trans('messages.6'));
            }
        }
        $getSection = Section::get();
        return view('Admin-view.categories.add_edit_category')->with(compact('title', 'getSection'));
    }

    public function appendCategoriesLevel(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            $condition = array('section_id' => $data['section_id'], 'status' => 1, 'parent_id' => 0);
            $getCategories = Category::with('subcategories')->where($condition)->get();
           // dd($getCategories);
           // $getCategories = json_decode(json_encode($getCategories), true);            
            return view('Admin-view.categories.append_categories_level')->with(compact('getCategories'));
        }
    }

}
