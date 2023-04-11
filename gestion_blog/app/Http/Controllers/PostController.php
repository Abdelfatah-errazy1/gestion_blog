<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\IndexDefinition;

class PostController extends Controller
{
    public function index(){
        // Post::factory(12)->create(['category_id'=>3]);
        $posts=Post::latest()->filter(request(['search','category','auther']));
       
        return view('posts.index', [
            'posts' => $posts->simplePaginate(6)->withQueryString(), //paginate or simplePaginate
            // 'categories' => category::all(),
            // 'currentCategory'=>category::firstWhere('slug',request('category'))
        ]);
    }
    public function show( Post $post){
        return view('posts.show',[
            'post'=>$post
        ]);
    }
}
