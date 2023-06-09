<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PopularCategory;
use App\Models\ThreeColumnCategory;
use App\Models\MegaMenuSubCategory;

class ProductSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $subCategories = SubCategory::with('category', 'childCategories', 'products')->get();
        $pupoularCategory = PopularCategory::first();
        $threeColCategory = ThreeColumnCategory::first();
        return view('admin.product_sub_category', compact('subCategories', 'pupoularCategory', 'threeColCategory'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.create_product_sub_category', compact('categories'));
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories',
            // 'sub_category_code'=>'required|unique:sub_categories',
            'category' => 'required',
            'status' => 'required',
            'image' => 'required'
        ];

        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'category.required' => trans('admin_validation.Category is required'),
        ];
        $this->validate($request, $rules, $customMessages);
        // $category = Category::find($request->category);
        // $subcategory = SubCategory::where('category_id', $request->category)->orderBy('id', 'DESC')->first();
        // $subCategory = new SubCategory();
        // $subCategory->category_id = $request->category;
        // $subCategory->name = $request->name;
        // $subCategory->slug = $request->slug;
        // $subCategory->status = $request->status;
        // if (isset($subcategory)) {
        //     $subcategory->sub_category_code = $subcategory->sub_category_code + 1;
        // } else {
        //     $subCategory->sub_category_code = $category->category_code . '-' . ($subcategory->sub_category_code + 1);
        // }
        // if ($request->hasfile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension(); // getting image extension
        //     $filename = time() . '.' . $extension;
        //     $file->move(public_path('images'), $filename);
        //     $subCategory['image'] = 'public/images/' . $filename;
        // }
        // $subCategory->save();
        $category = Category::find($request->category);
        $subcategory = SubCategory::where('category_id', $request->category)->orderBy('id', 'DESC')->first();

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->status = $request->status;

        if (isset($subcategory)) {
            $string = $subcategory->sub_category_code;
            $parts = explode("-", $string);
            $valueAfterHyphen = $parts[1]+ 1;
            $valueBeforeHyphen = $parts[0];
            $subCategory->sub_category_code =$valueBeforeHyphen."-".$valueAfterHyphen;
        } else {
            $subCategory->sub_category_code = $category->category_code . '-1';
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $subCategory->image = 'public/images/' . $filename;
        }

        $subCategory->save();


        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.product-sub-category.index')->with($notification);
    }

    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.edit_product_sub_category', compact('subCategory', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,' . $subCategory->id,
            'category' => 'required',
            'status' => 'required',
        ];

        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'category.required' => trans('admin_validation.Category is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->status = $request->status;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $subCategory['image'] = 'public/images/' . $filename;
        }
        $subCategory->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.product-sub-category.index')->with($notification);
    }


    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        MegaMenuSubCategory::where('sub_category_id', $id)->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.product-sub-category.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $subCategory = SubCategory::find($id);
        if ($subCategory->status == 1) {
            $subCategory->status = 0;
            $subCategory->save();
            $message = trans('admin_validation.InActive Successfully');
        } else {
            $subCategory->status = 1;
            $subCategory->save();
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
}
