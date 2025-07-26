<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    
    public function index(){
        $bahans = Bahan::all();
        return view('index', compact('bahans'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'kuantiti' => 'required|integer|min:0'
        ]);

        Bahan::create($request->all());

        return redirect()->route('index')
                        ->with('success', 'Bahan baru berjaya ditambah!');
    } 

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'kuantiti' => 'required|numeric'
        ]);

        $bahan = Bahan::findOrFail($id);
        $bahan->update($request->all());

        return redirect()->back()->with('success', 'Kemaskini berjaya!');
    }

}
