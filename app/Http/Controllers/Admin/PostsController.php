<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    // バリデーションのルール
    public $validateRules = [
        'title' => 'required',
        'content' => 'max:500'
    ];
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validateRules);
        Post::create($request->all());
        \Session::flash('flash_message', '記事を作成しました。');
        return redirect('admin/posts');
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validateRules);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        \Session::flash('flash_message', '記事を更新しました。');
        return redirect('admin/posts');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete($id);
        \Session::flash('flash_message', '記事を削除しました。');
        return redirect('admin/posts');
    }
}
