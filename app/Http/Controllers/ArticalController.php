<?php

namespace App\Http\Controllers;

use App\Artical;
use Illuminate\Http\Request;
use App\Http\Resources\ArticalResource;
use RealRashid\SweetAlert\Facades\Alert;

class ArticalController extends Controller
{

    public function index()
    {
//         $articas = ArticalResource::collection(Artical::orderBy('created_at','desc')->paginate(10));
          $articals = Artical::orderBy('created_at','desc')->paginate(6);
          return response()->json($articals, 200);
    }

    public function store(Request $request)
    {
        //  $data = $request->isMethod('put') ? Artical::findOrfail($request->artical) : new Artical;
        //  $pathToFile = $request->file('image')->store('images', 'public');
        //  if ($request->file('image') == null) {
        //     $file = "";
        // }else{
        //    $file = $request->file('image')->store('images');  
        // }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            // 'image' => 'required'
        ]);
 
         $data = new Artical;
         $data->title = $request->title;
         $data->body = $request->body;
         $data->image = $request->image;
     
         if($data->save()){
             alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            return response()->json("success", 200);
         }  

    }

    public function show(Artical $artical)
    {
//        return ArticalResource::collection(Artical::findOrfail($artical));
        return $artical;
    }

    public function update(Request $request, Artical $artical)
    {

         $artical->title = $request->title;
         $artical->body = $request->body;
         $artical->image = $request->image;
         if($artical->save()){
            return response()->json($artical,200);
        }
    }

    public function destroy(Artical $artical)
    {
        if($artical->delete()){
            return "data deleted";
        }
        else{
            abort(404);
        }


    }
}
