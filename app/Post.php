<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title','body'];

    public function author(){
        return $this->hasOne('App\Author','id','author_id');
    }

}
