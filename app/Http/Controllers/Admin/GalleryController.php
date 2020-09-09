<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Gallery;
use App\Image;



class GalleryController extends Controller
{
    function __construct()
    {
         $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Gallery::all();
        foreach($results as $key => $val){
            $results[$key]['user_name'] = User::find($val->user_id)->name;            
        }
        return view('admin.gallery.index',compact('results'));
    }

    public function show($id)
    {
        $results = Image::where('gallery_id',$id)->get();    
        return view('admin.gallery.view',compact('results'));
    }

    public function imageDestroy($id)
    {
        Image::destroy($id);
        return redirect("admin/gallery")->with('message','Image deleted successfully.');
    }

    public function destroy($id)
    {
        Gallery::destroy($id);
        return redirect("admin/gallery")->with('message','Gallery deleted successfully.');
    }
}
