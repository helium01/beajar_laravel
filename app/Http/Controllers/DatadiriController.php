<?php

namespace App\Http\Controllers;

use App\Models\Datadiri;
use Illuminate\Http\Request;

class DatadiriController extends Controller
{
    public function tampildata(){
        return view("soal3");
    }
    public function index()
    {
        $data=Datadiri::all();
        return response()->json($data);
    }

    public function show($id)
    {
        
        $data=Datadiri::find($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data=Datadiri::where("nim",$request->nim)->get();
        if($data->count() !=0){
            return response()->json("data nim sudah ada");
        }
        return Datadiri::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $datadiri = Datadiri::find($id);
        $datadiri->update($request->all());
        return response()->json($datadiri);
    }

    public function destroy($id)
    {
        Datadiri::destroy($id);
        return response()->json("data terhapus");
    }
}
