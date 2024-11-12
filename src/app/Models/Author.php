<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // カラムに対して書き換えの設定
    protected $fillable = ['name', 'age', 'nationality'];

    // データ加工するメソッド
    public function getDetail()
    {
        $txt = 'ID:' . $this->id . ' ' . $this->name . '(' . $this->age .  '才' . ') ' . $this->nationality;
        return $txt;
    }

    // has Oneを利用するためのメソッド　1対1(hasOne)
    // authorテーブルのレコードに対応するbooksテーブルのレコードが取り出せるようになる
    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }

    // 1対多(hasMany)
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
