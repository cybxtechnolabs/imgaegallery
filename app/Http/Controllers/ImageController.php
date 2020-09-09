<?php

namespace App\Http\Controllers;
use App\Image;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($Gallery_id)
    {
        $user = Auth::user();
        
        //check if loginuser match with the owner of the gallery

        //get gallery info
        $Gallery = Gallery::with('images')->where('id', $Gallery_id)->first();
        if($Gallery === null) {
            return redirect('/');
        }
        if($user->id == $Gallery->user_id) {
            //check if this gallery have images
            $galleryimages = Image::where('gallery_id', '=', $Gallery_id)->get();
            return view('images.index')->with('gallery', $Gallery)->with('galleryimages', $galleryimages);
        } else {
            abort(403, 'Unauthorized action.');
        }
        

    }

    public function create($Gallery_id)
    {
        return view('images.create')->with('gallery_id', $Gallery_id);
    }

    public function upload(Request $request)
    {
        $previousUrl = (string)url()->previous();
        $pieces = explode('/', $previousUrl);
        $gallery_id = array_pop($pieces);
    
        //get extension
        $ext = $request->file('file')->getClientOriginalExtension();
        
        if(isset($_FILES['file'])) {
            if($_FILES['file']['size'] > 10485760) { //10 MB (size is also in bytes)
                // File too big
                return response()->json(["status" => "error"]);
            } else {
                //$filenameWithoutExt = preg_replace('/\..+$/', '', $request->file('file')->getClientOriginalName());
                $filenameWithoutExt = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->file('file')->getClientOriginalName())));
                $filenameWithoutspace = str_replace(' ', '_', $filenameWithoutExt);
                $final_filename = $filenameWithoutspace. '_'. time(). '.'.$ext;
                //$final_filename = time().'.'.$ext;
                
                //arrange images gallery folder wise

                $foldername = public_path('images').'/'.$gallery_id;
                if (!file_exists($foldername)) {
                    mkdir($foldername, 0777, true);
                }
                $image = $request->file('file');
                $image->move($foldername, $final_filename);

                $data  =   Image::create([
                        'name' => $filenameWithoutExt,
                        'path' => $final_filename, 
                        'gallery_id' => $gallery_id,
                    ]);
                
                return response()->json(["status" => "success", "data" => $data]);
            }
        }
    }


    public function destroy(Request $request)  
    {  
        $user = Auth::user();
        $filename =  $request->get('filename');
        //remove extenstion from the filename
        $filename = pathinfo($filename, PATHINFO_FILENAME); 
        
        $lastImage = Image::where('name',$filename)->orderBy("id", "DESC")->first();

        if($lastImage !== null) {
            $Image = Image::find($lastImage->id);  
            $Image->delete(); 
    
            $previousUrl = (string)url()->previous();
            $pieces = explode('/', $previousUrl);
            $gallery_id = array_pop($pieces);
    
            //unlink folder
            unlink(public_path('images').'/'. $gallery_id .'/'. $Image->path );
    
            //redirect to galleries list
            //$Galleries = Gallery::where('user_id', $user->id)->get();
            //return view('gallery.index')->with('userGalleries', $Galleries);
            return redirect('gallery/'.$gallery_id)->with('success', 'images Successfully Deleted!');
        } else {
            return response()->json(["status" => "File was not uploaded!"]);
        } 
    }
}
