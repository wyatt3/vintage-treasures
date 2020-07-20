<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\Quote;
use App\Hours;
use App\BlogPost;
use App\GalleryImage;
use Config;
use Illuminate\Support\Facades\Mail;
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
        Mail::to(Config::get('constants.admin_email'))->send(new Quote($name, $phoneNum, $email, $message));
        return redirect(route('home'))->with('message', 'true');
    }
}
