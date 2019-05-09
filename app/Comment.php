<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['value'];

    public function post(){
        return $this->belongsTo('App\Post','post_id','id');
    }

}
