<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','category_id','content','picture','slug','users_id'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tags');
    }
    public function users(){
    	return $this->belongsTo('App\User');
    }
}
