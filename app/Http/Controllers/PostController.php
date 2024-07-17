<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Cache::remember("posts.{$slug}", 60, function () use ($slug) {
            return Post::where('slug', $slug)->firstOrFail();
        });

        return view('posts.show', compact('post'));
    }

    public function create(Request $request)
    {
        // Logic to check if user can create more blogs today (max 3)
        $user = Auth::user();
        $todayPostsCount = $user->posts()->whereDate('created_at', today())->count();

        if ($todayPostsCount >= 3) {
            return redirect()->back()->with('error', 'You have reached your daily limit for creating blogs.');
        }

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('createPost', [
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'content' => 'required',
        ]);

        $slug = Str::slug($validatedData['title'], '-');

        // Ensure slug uniqueness
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Post::create([
            'user_id' => Auth::id(),
            'slug' => $slug,
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('posts.index')->with('success', 'post-created');
    }
}
