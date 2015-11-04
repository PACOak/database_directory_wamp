<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
  public function index()
  {
      $posts = Post::where('published_at', '<=', Carbon::now())
          ->orderBy('published_at', 'desc')
          ->paginate(config('blog.posts_per_page'));

      return view('blog.index', compact('posts'));
  }

  public function showPost($slug)
  {
      $post = Post::whereSlug($slug)->firstOrFail();

      return view('blog.post')->withPost($post);
  }
  public function sayHello()
  {
      return "blah blah blah";
  }
  public function showFirstPost()
  {
      $post = Post::orderBy('id','desc')->first();
      return view('blog.newview')->withPost($post);
  }
  public function showPostImages()
  {
      $posts = Post::all();
      return view('blog.images', compact('posts'));
  }
}
?>
