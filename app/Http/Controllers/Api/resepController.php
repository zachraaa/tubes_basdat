<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resource\ResepResource;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class resepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resep = Resep::all();
        return response($resep,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'namaMasakan' => 'required|max:255|unique:reseps',
            'estimasiWaktu' => 'required|max:255',
            'tingkatKesulitan' => 'required',
            'alat' => 'required',
            'bahan' => 'required',
            'caraMembuat' => 'required',
        ]);

        if($validator->fails()){
            return response([
                'error'=>$validator->errors(),
                'status'=>'Validation Error'
            ]);
        }
        $resep = Resep::create($request->all());
        return response(['data' => $resep, 'message' => 'Resep has been created!'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resep = Resep::find($id);
        if ($resep != null) {
            return response($resep, 200);
        }else{
            return response([
                'message' => 'No data found',
            ],403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'namaMasakan' => 'required|max:255|unique:reseps',
        ]);

        if ($validator->fails()) {
            return response([
                'error'=>$validator->errors(),
                'status'=>'Validation Error'
            ]);
        }
        $resep = Resep::find($id);
        if ($resep != null) {
            $resep->update($request->all());
            return response(['data' => $resep, 'message'=>'Resep has been updated!'], 202);
        } else{
            return response(['message'=>'No data found!'],403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep = Resep::find($id);
        if ($resep != null) {
            $resep->delete();
            return response(['message'=>'Resep has been deleted!']);
        } else{
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }
}
