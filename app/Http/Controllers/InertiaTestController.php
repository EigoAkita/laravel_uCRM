<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        // return viewの場合は、'Inertia.index'
        // InertiaTest::all()で、inertia_testsテーブルのデータを全権取得
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
        // dd($id);

        // vue側に渡したい変数を入力['id' => $id]
        return Inertia::render('Inertia/Show', [
            'id' => $id,
            // 引数のidに応じた$idのinertia_testsテーブルのデータを取得
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest;

        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        // リダイレクトメソッド
        // ->withでフラッシュメッセージ（セッションメッセージ）を渡す事が可能
        return to_route('inertia.index')->with([
            'message' => '登録しました！'
        ]);
    }

    public function delete($id)
    {
        $book = InertiaTest::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')->with([
            'message' => '削除しました！'
        ]);
    }
}