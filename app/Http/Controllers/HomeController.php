<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Hours;
use App\BlogPost;
use App\GalleryImage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hours = Hours::all();
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(3);
        $gallery = GalleryImage::paginate(9);
        return view('home', ['hours' => $hours, 'posts' => $posts, 'gallery' => $gallery]);
    }
}
