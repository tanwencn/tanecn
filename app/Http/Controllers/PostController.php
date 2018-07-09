<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tanwencn\Blog\Database\Eloquent\Comment;
use Tanwencn\Blog\Database\Eloquent\Post;
use Tanwencn\Blog\Database\Eloquent\PostCategory;
use Tanwencn\Blog\Database\Eloquent\PostTag;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $model = Post::with('categories', 'tags')->withCount('comments');

        //筛选器
        $search = $request->query('search');
        $category = $request->query('category');
        $tag = $request->query('tag');

        if (!empty($search)) $model->where('title', 'like', "%{$search}%");

        if (!empty($category)) $model->whereHas('categories', function ($query) use ($category) {
            $query->where('id', $category);
        });

        if (!empty($tag)) $model->whereHas('tags', function ($query) use ($tag) {
            $query->where('id', $tag);
        });

        $data = $model->simplePaginate()->appends(request()->query());

        /*var_dump($data[0]->comments_count);
        var_dump($data[0]->id);
        exit;*/

        $categories = PostCategory::all();

        $tags = PostTag::all();

        return view('post/index', compact('data', 'categories', 'tags'));
    }

    public function detail($slug)
    {
        $model = Post::with(['categories', 'tags'])->findBySlugOrFail($slug);

        $comments = $model->comments()->paginate()->fragment('comment_list');

        return view('post/detail', compact('model', 'comments'));
    }

    public function comment(Request $request)
    {
        $post = Post::withCount('comments')->findBySlugOrFail($request->input('slug'));

        if(!$post->canComment()){
            if($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => '保存失败！'
                ]);
            }else{
                return back()->withInput()->withErrors('保存失败！');
            }
        }

        $data = $request->input();

        $comment = new Comment($data);

        $comment->is_release = $post->isAuditComment()?0:1;

        $post->comments()->save($comment);

        if($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => '保存成功！'
            ]);
        }else{
            return back()->with('success', '保存成功！');
        }
    }
}
