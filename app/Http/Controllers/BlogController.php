<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => BlogPost::query()->published()->latest('published_at')->latest()->paginate(9),
            'featuredPost' => BlogPost::query()->published()->where('is_featured', true)->latest('published_at')->latest()->first(),
            'metaTitle' => 'Blog | ADYSURVE LTD',
            'metaDescription' => 'Read ADYSURVE insights on IT infrastructure, CCTV security, solar energy, digital skills, and smart business technology.',
        ]);
    }

    public function show(string $slug)
    {
        $post = BlogPost::query()->published()->where('slug', $slug)->firstOrFail();

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => BlogPost::query()
                ->published()
                ->where('id', '!=', $post->id)
                ->when($post->category, fn ($query) => $query->where('category', $post->category))
                ->latest('published_at')
                ->take(3)
                ->get(),
            'metaTitle' => $post->meta_title ?: $post->title.' | ADYSURVE LTD',
            'metaDescription' => $post->meta_description ?: $post->excerpt,
        ]);
    }
}
