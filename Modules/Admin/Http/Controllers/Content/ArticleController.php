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
use App\Models\Country;
use Auth;
class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Articles::with('tags')->orderBy('order_num','ASC')->get();
        return view('admin::content.articles.index',compact('articles'));
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $tags = Tags::pluck('name','id');
       
        $parentCategories =  Category::whereNull('parent_cat')->orderBy('order_num','ASC')->get();
        $countries = Country::pluck('country_name','country_code');
    
        $countries->prepend('Select Country','');
        return view('admin::content.articles.create',compact('tags','parentCategories','countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request);
        
        if($request->hasfile('abstract_image')){
            $abstract_file = $request->file('abstract_image');
            $abstract_filename =  time().'_'.$abstract_file->getClientOriginalName();
            $abstract_path = $abstract_file->storeAs('public/'.date('Y').'/article/images', $abstract_filename);
            $abstract_url = Storage::url(date('Y').'/articles/images/'.$abstract_filename);
            $data['image'] = $abstract_url;
        }
        if($request->hasfile('slider_image')){
            $slider_file = $request->file('slider_image');
            $slider_filename =  time().'_'.$slider_file->getClientOriginalName();
            $slider_path = $slider_file->storeAs('public/'.date('Y').'/article/sliderimages', $slider_filename);
            $slider_url = Storage::url(date('Y').'/articles/sliderimages/'.$slider_filename);
            $data['slider_image'] = $slider_url;
        }

        if($request->hasfile('video_attachment')){
            $video_file = $request->file('video_attachment');
            $video_filename =  time().'_'.$video_file->getClientOriginalName();
            $video_path = $video_file->storeAs('public/'.date('Y').'/article/sliderimages', $video_filename);
            $video_url = Storage::url(date('Y').'/articles/video/'.$video_filename);
            $data['video_attachment'] = $video_url;
        }

        if($request->hasfile('swl_file')){
            $swl_file = $request->file('swl_file');
            $swl_filename =  time().'_'.$swl_file->getClientOriginalName();
            $swl_path = $swl_file->storeAs('public/'.date('Y').'/article/sliderimages', $swl_filename);
            $swl_url = Storage::url(date('Y').'/articles/swf_file/'.$swl_filename);
            $data['swl_file'] = $swl_url;
        }

        $articles = Articles::orderBy('order_num','asc')->get();
        if(count($articles) !=0){
            $data['order_num'] = $articles[count($articles)-1]['order_num'] +1; 
        }else{
            $data['order_num'] = 0;
        }

        $article = Articles::create($data);
        $this->tags_store($article->id,$request);
        return redirect('article/'.$article->id.'/edit')->with('success','Article created successfully');

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
        $tags = Tags::pluck('name','id');
       
        $parentCategories =  Category::whereNull('parent_cat')->orderBy('order_num','ASC')->get();
        $countries = Country::pluck('country_name','country_code');
    
        $countries->prepend('Select Country','');

        $article = Articles::with('tags')->where('id',$id)->first();

        return view('admin::content.articles.edit',compact('tags','parentCategories','countries','article'));
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
        Articles::find($id)->update($data);
        ArticlesTags::where('article_id',$id)->delete();
        $this->tags_store($id,$request);
        return redirect()->back()->with('success','Article updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        // return $id;
        $article = Articles::find($id);
        $article->delete();
        ArticlesTags::where('article_id',$id)->delete();
        return redirect()->back()->with('success','Article deleted successfully');
    }
    public function validation($request){
        $request->validate([
            'title'         => 'required|string|max:191|min:4',
            'abstract'      => 'nullable|string',
            'image_caption' => 'nullable|string|max:191|min:1',
            'source'        => 'nullable|string|max:191|min:1',
            'source_url'    => 'nullable|string|max:191|min:1',
            'description'   => 'nullable|string', 
            'abstract_image'=> 'nullable|mimes:jpg,jpeg,png,gif', 
            'slider_image'  => 'nullable|mimes:jpg,jpeg,png,gif', 
        ]);

         $data = [
            'category_id'           => $request->parent_cat,
            'user_id'               => Auth::user()->id,
            'title'                 => $request->title,
            'body'                  => $request->body,
            'image_caption'         => $request->image_caption,
            'source'                => $request->source,
            'source_url'            => $request->source_url,
            'abstract'              => $request->abstract,
            'status'                => $request->status,
            'publish_date'          => $request->publish_date.' '. date('H:i:s'),
            'show_comment'          => $request->show_comment,
            'show_poll'             => $request->show_poll,
            'rss_feed'              => $request->rss_feed,
            'show_author'           => $request->show_author,
            'show_abstract_image'   => $request->show_abstract_image,
            'directory_show'        => $request->directory_show,
            'directory_bname'       => $request->directory_bname,
            'directory_cname'       => $request->directory_cname,
            'directory_email'       => $request->directory_email,
            'directory_address'     => $request->directory_address,
            'directory_country'     => $request->directory_country,
            'directory_state'       => $request->directory_state,
            'directory_city'        => $request->directory_city,
            'directory_zip'         => $request->directory_zip,
            'directory_tele'        => $request->directory_tele,
            'directory_fax'         => $request->directory_fax,
            'directory_website'     => $request->directory_website,
            'sefriendly'            => $request->sefriendly,
            'sef_title'             => $request->sef_title,
            'meta_keywords'         => $request->meta_keywords,
            'meta_descriptions'     => $request->meta_descriptions,
        ];
        return $data;
    }
    public function tags_store($id,$request){
        if($request->tag_id !=null){
            foreach ($request->tag_id as $key => $value) {
                $tag =Tags::find($value);
                $tags = new ArticlesTags();
                $tags->tag_id = $value;
                $tags->article_id = $id;
                $tags->tags_group_id = $tag->tags_group_id;
                $tags->user_id = Auth::user()->id;
                $tags->save();
            }
        }
    }
}
