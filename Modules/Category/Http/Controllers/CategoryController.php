<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $parentCategories =  Category::whereNull('parent_cat')->get();
        return view('category::category.index',compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $parentCategories =  Category::whereNull('parent_cat')->get();
        $categoryInfo = null;
        return view('category::category.create',compact('parentCategories','categoryInfo'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename =  time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('public/'.date('Y').'/abstractimages', $filename);
            $url = Storage::url(date('Y').'/abstractimages/'.$filename);
            $data['image'] = $url;
        }
        Category::create($data);
        return redirect()->back()->with('success','Category created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $categoryInfo = Category::where('sefriendly', $id)->first();


        $parentCategories =  Category::whereNull('parent_cat')->get();
        return view('category::category.edit',compact('parentCategories','categoryInfo'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validation($request);
        $category =  Category::find($id);
        $category->update($data);
        return redirect()->back()->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function validation($request){
        return $request->validate([
            'category_name'     => 'required|min:4|max:50|string',
            'sefriendly'        => 'required|string',
            'parent_cat'        => 'nullable',
            'article_num'       => 'nullable|min:1|max:4|string',
            'view_subcat'       => 'required',
            'cat_cust_title'    => 'nullable',
            'cat_cust_keywords' => 'nullable',
            'cat_cust_desc'     => 'nullable',
            'image'             => 'nullable|mimes:jpeg,jpg,png'
        ]);               
    }
}
