<?php

namespace Modules\Admin\Http\Controllers\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Admin\Entities\Article\Articles;
use Modules\Admin\Entities\Article\ArticleImages;
use Modules\Admin\Entities\Article\ArticleAttachments;
use Modules\Admin\Entities\Article\ArticlesRevisions;
use Modules\Admin\Entities\Article\ArticlesSchedules;
use Modules\Admin\Entities\Article\ArticlesStats;
use Modules\Admin\Entities\Article\ArticlesTags;
use Modules\Category\Entities\Tags;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\User;
class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin::content.articles.index');
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $tags = Tags::all();
        $parentCategories =  Category::whereNull('parent_cat')->orderBy('order_num','ASC')->get();
        return view('admin::content.articles.create',compact('tags','parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::content.articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::content.articles.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
