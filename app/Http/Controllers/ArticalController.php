<?php

namespace App\Http\Controllers;

use App\Artical;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\ArticalResource;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articas = ArticalResource::collection(Artical::paginate(10));
         return response()->json($articas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function show(Artical $artical)
    {
         $show = ArticalResource::collection(Artical::findOrfail($artical));
         return response()->json($show,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function edit(Artical $artical)
    {
        $data = ArticalResource::collection(Artical::findOrfail($artical));
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artical $artical)
    {
       
         $artical->title = $request->title;
         $artical->body = $request->body;
         if($artical->save()){
            return "Data updated";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artical  $artical
     * @return \Illuminate\Http\Response
     */
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
