<?php
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Posts{
  public static function find ($slug){
    $path=resource_path("posts/{$slug}.html");
    
    if(!file_exists($path)){
        throw new ModelNotFoundException();
     }
     $post=file_get_contents($path);
     return view('post',[
         'post'=>$post
     ]);
    }
    public static function all(){
      $files=File::files(resource_path("posts/"));

      return array_map(function($file){
        return $file->getContents();
      },$files);
    }
  }


?>