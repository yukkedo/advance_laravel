<?php

namespace App\Http\Controllers;

// Authorモデルの読み込み
use App\Models\Author;
use Illuminate\Http\Request;
// フォームリクエストの読み込み　バリデーションの適用
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // indexアクション
    public function index()
    {
        $authors = Author::all();
        return view('index', ['authors' => $authors]);
    }

    // addアクション データ追加用ページを呼び出す
    public function add()
    {
        return view('add');
    }

    // データ追加用ページのフォームに入力された値を取得
    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        // Eloquentのcreateメソッドの使用
        Author::create($form);
        return redirect('/');
    }

    // データ編集ページの表示
    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        // IDを使用して更新対象のデータを取得する
        return view('edit', ['form' => $author]);
    }

    // データベースにデータの更新を保存(データ更新処理)
    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // データ削除用ページの表示
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }

    // 削除対象のidを取得し、idに対応するレコードをDBから削除する
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

    // public function remove(Request $request)
    // {
    //     // dd($request->all()); // 追加
    //     Author::find($request->id)->delete();
    //     return redirect('/');
    // }

    // name属性を利用した検索
    public function find()
    {
        return view('find', ['input' => '']);
    }
    
    public function search(Request $request)
    {
        $item = Author::where('name', 'LIKE', "%{$request->input}%")->first();
        // ↑　LIKEと％：部分一致
        // $item = Author::where('name', $request->input)->first();
        // ↑　完全一致を調べる場合
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    // モデル結合ルート　モデルインスタンスの作成
    public function bind(Author $author)
    {
        $data = [
            'item' => $author,
        ];
        return view('author.binds', $data);
    }

    public function verror()
    {
        return view('verror');
    }

    // authorsテーブルのデータを返すアクション　リレーション確認
    // public function relate(Request $request)
    // {
    //     $items = Author::all();
    //     return view('author.index', ['items' => $items]);
    // }

    // リレーションの有無の確認
    public function relate(Request $request)
    {
        $items = Author::all();
        return view('author.index', ['items' => $items]);

        $hasItems = Author::has('book')->get();
        // リレーションの値を持つ
        $noItems = Author::doesntHave('book')->get();
        // リレーションの値を持たない
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('author.index', $param);
    }
}
