<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;

class resepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseps = Resep::all();
        return view('reseps.index', compact('reseps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reseps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaMasakan' => 'required|max:255|unique:reseps',
            'estimasiWaktu' => 'required|max:255',
            'tingkatKesulitan' => 'required',
            'alat' => 'required',
            'bahan' => 'required',
            'caraMembuat' => 'required',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->caraMembuat), 200);

        Resep::create($validatedData);

        return redirect('/reseps')->with('success', 'resep berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        return view('reseps.edit',[
            'resep' => $resep
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        $validatedData = $request->validate([
            'namaMasakan' => 'required|max:255|unique:reseps',
            'estimasiWaktu' => 'required|max:255',
        ]);

        Resep::where('id', $resep->id)->update($validatedData);

        return redirect('/reseps')->with('success', 'resep berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resep::findOrFail($id)->delete();
        return redirect()->back();
    }
}
