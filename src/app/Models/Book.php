<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'author_id' => 'required',
        'title' => 'required',
    );

    public function getTitle(){
        return 'ID'.$this->id . ':' . $this->title . '著者' . optional($this->author)->name;
    }

    // belongs To結合　本から著者を探す
    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }
}
