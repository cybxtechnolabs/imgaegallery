<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Gallery = $galleryimages = [];
        return view('home')->with('gallery',$Gallery )->with('galleryimages', $galleryimages);
    }

    public function link(Request $request, $slug='')
    {
        $Gallery = $galleryimages = [];
        if($slug) {
            $Gallery = Gallery::where('slug', '=',  $slug)->first();
            if ($Gallery === null) {
                //slug is incorrectt or not available
                return redirect('/');
            }
            
            //check if this gallery have images
            $Gallery_id = $Gallery->id;
            $galleryimages = Image::where('gallery_id', '=', $Gallery_id)->get();
        }
        return view('home')->with('gallery',$Gallery )->with('galleryimages', $galleryimages);
    }
}
