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
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(3, ['*'], 'posts');
        $gallery = GalleryImage::paginate(9, ['*'], 'gallery');
        return view('home', ['hours' => $hours, 'posts' => $posts, 'gallery' => $gallery]);
    }

    public function getQuote(Request $request) {
        $name = $request['name'];
        $phoneNum = $request['phoneNumber'];
        $email = $request['email'];
        $message = $request['message'];
        mail('vintagetreasures@gmail.com', 'Get Quote - Vintage Treasures', 'Name: ' . $name . '\n Phone Number: ' . $phoneNum . '\n Reply Email: ' . $email . '\n Message: ' . $message);
        return redirect(route('home')->with('message', 'true'));
    }
}
