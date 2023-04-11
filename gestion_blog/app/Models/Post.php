<?php

namespace App\Models;

use Egulias\EmailValidator\Warning\CFWSNearAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['id','title','excerpt','body'];

    public function scopeFilter($query,Array $filters){
        $query->when($filters['search']?? false,fn($query,$search)=>$query
            ->where(fn($query)=>
            $query
                ->where('title','like', '%'.$search.'%')
                ->orWhere('excerpt','like', '%'.$search.'%')));
      
        $query->when($filters['category']?? false,fn($query,$category)
        =>$query->whereHas('category',fn($query)=> $query
            ->where('slug',$category)));

        $query->when($filters['auther']?? false,fn($query,$auther)
        =>$query->whereHas('auther',fn($query)=> $query
            ->where('name',$auther)));
        // =>$query->whereExists(fn($query)=> $query->from('categories')
        //     ->whereColumn('categories.id', 'posts.category_id')
        //     ->where('slug',$category)));
      
    }
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function auther(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
