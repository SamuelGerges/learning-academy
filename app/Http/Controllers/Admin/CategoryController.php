<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::select()->orderBy('id','DESC')->get();
        return view('admin.categories.index',$data);
    }


    public function create()
    {
        return view('admin.categories.create');

    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        if (!$category)
            return back();
        return redirect()->route('admin.showCategory');
    }

    public function edit($id)
    {
        $data['category'] = Category::find($id);
        if(!$data['category'])
            return redirect()->route('admin.showCategory');
        return view('admin.categories.edit',$data);
    }


    public function update($id,CategoryRequest $request)
    {
        $category = Category::find($id);
        if(!$category)
            return redirect()->route('admin.showCategory');

        $categoryUpdated =  $category->update($request->validated());
        if (!$categoryUpdated)
            return back();
        return redirect()->route('admin.showCategory');
    }


    public function delete($id)
    {
        $category = Category::find($id);
        if(!$category)
            return redirect()->route('admin.showCategory');
        $category->delete();
        return back();
    }
}
