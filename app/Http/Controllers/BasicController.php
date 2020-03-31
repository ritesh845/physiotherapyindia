<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Article\Articles;
class BasicController extends Controller
{
    public function article_show($id){
    	$article = Articles::select('id','title','category_id','image','slider_image','body','sefriendly','created')->with('category')->where('sefriendly',$id)->first();
 // return $article;
    	return view('pages.articles.show',compact('article'));
    }
}
