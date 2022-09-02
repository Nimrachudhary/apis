<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    public function index(){
        $product=data::all();
        return response()->json(['products'=>$product],200);
        }

        public function addshow($id){
            $product=data::find($id);
            if($product)
            {
                return response()->json(['products'=>$product],200);
            }
            else
            {
                return response()->json(['message'=>'no recode'],404);
            }
         }

      public function addstore(Request $request){
        $request->validate([
           'name'=>'required|max:191',
           'adress'=>'required|max:191',
           'phone'=>'required|max:191',
        ]);
        $product = new data;
        $product->name = $request->name;
        $product->adress = $request->adress;
        $product->phone = $request->phone;
        $product->save();
        return response()->json(['message'=>'data added successfully'],200);
      }
      public function dataupdate(Request $request,$id){

     $request->validate([
           'name'=>'required|max:191',
           'adress'=>'required|max:191',
           'phone'=>'required|max:191',
        ]);
        $product = data::find($id);
        if( $product){
            $product->name = $request->name;
            $product->adress = $request->adress;
            $product->phone = $request->phone;
            $product->update();

            return response()->json(['message'=>'data added successfully'],200);
        }
        else{
            return response()->json(['message'=>'no data found'],404);
        }

      }
      public function delete($id)
      {
        $product=data::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['message'=>'delete successfully'],200);
        }
        else{
            return response()->json(['message'=>'not found'],404);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(data $data)
    {
        //
    }
}
