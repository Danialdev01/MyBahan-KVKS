<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    
    public function utama(){
        $bahans = Bahan::all();
        return view('utama', compact('bahans'));
    }

    public function pembelian(){
        $bahans = Bahan::all();
        return view('pembelian', compact('bahans'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kuantiti' => 'required|integer|min:0'
        ]);
        $data['status'] = 1;

        Bahan::create($data);

        return redirect()->route('utama')->with('success', 'Bahan baru berjaya ditambah!');
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

    public function beli(Request $request, $id){

        Bahan::where('id', $id)->update(['status' => 2]);

        return redirect()->back()->with('success', 'Pembelian berjaya!');

    }

    public function delete(Request $request, $id){
        $bahan = Bahan::findOrFail($id);

        // Delete the record
        $bahan->delete();
        return redirect()->back()->with('success', 'Penghapusan Berjaya!');
    }

}
