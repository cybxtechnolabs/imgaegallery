<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        //$Gallery = Gallery::paginate(1);
        $user = Auth::user();
        $Galleries = Gallery::where('user_id', $user->id)->get();
        
        return view('gallery.index')->with('userGalleries', $Galleries);
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([  
            'name'=>'required',
        ]);  

        $Gallery = new Gallery();
        $Gallery->user_id = Auth::id();
        $Gallery->name = $request->name;
        $slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->name)));
        $Gallery->slug = $slug;
        $Gallery->save();
        //get gallery id;
        $galleryimages = [];
        $Gallery_id = $Gallery->id;

        return redirect('gallery')->with('success', 'gallery Successfully Created!');
        // return view('images.index')
        //             ->with('gallery_id', $Gallery_id)
        //             ->with('gallery', $Gallery)
        //             ->with('galleryimages', $galleryimages);

            
    }

    public function edit($Gallery_id)
    {
        $user = Auth::user();
        $Gallery = Gallery::find($Gallery_id);
        return view('gallery.edit')->with(compact('Gallery'));
        
    }

    public function update(Request $request, $Gallery_id)  
    {  
        //validation
        $request->validate([  
            'name'=>'required',
        ]);
        $user = Auth::user();
        $Gallery = Gallery::find($Gallery_id);
        $Gallery->name = $request->name;
        $Gallery->save();

        //redirect to galleries list
        $Galleries = Gallery::where('user_id', $user->id)->get();
       // return view('gallery.index')->with('userGalleries', $Galleries);
        return redirect('gallery')->with('success', 'Gallery Successfully Updated!');
    }  

    public function destroy($Gallery_id)  
    {  
        $user = Auth::user();
        $Gallery=Gallery::find($Gallery_id); 
        $Gallery->delete(); 

        //redirect to galleries list
        //$Galleries = Gallery::where('user_id', $user->id)->get();
        //return view('gallery.index')->with('userGalleries', $Galleries);
        return redirect('gallery')->with('success', 'Gallery Successfully Deleted!');
    }  


}
