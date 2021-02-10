<?php

namespace App\Http\Controllers;

use App\Artical;
use Illuminate\Http\Request;
use App\Http\Resources\ArticalResource;

class ArticalController extends Controller
{

    public function index()
    {
//         $articas = ArticalResource::collection(Artical::orderBy('created_at','desc')->paginate(10));
        $articas = Artical::orderBy('created_at','desc')->paginate(6);
         return response()->json($articas, 200);
    }

    public function store(Request $request)
    {
        //  $data = $request->isMethod('put') ? Artical::findOrfail($request->artical) : new Artical;
         $data = new Artical;
         $data->title = $request->title;
         $data->body = $request->body;
         if($data->save()){
            return response()->json("data saved", 200);
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
