<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MatkulController extends Controller
{
    
    public function index(){
        $response = Http::get('http://localhost:8080/matkul');
        
        if (!$response->successful()) {
            return view('matkul.index', ['matkul' => []]);
        }
        
        $json = $response->json();
        $data = is_array($json) ? $json : [];
        
        return view('matkul.index', ['matkul' => $data]);
    }
    
    public function create(){
        $data = Http::get('http://localhost:8080/matkul');
    }
    
    public function store(Request $request){
        $data = Http::post('http://localhost:8080/matkul', [
            'kode_matkul' => $request->input('kode_matkul'),
            'nama_matkul' => $request->input('nama_matkul'),
            'sks' => $request->input('sks'),
        ]);
        
        if ($data->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data matkul Berhasil Ditambahkan');
        }
        
        // Tambah log buat debugging
        dd($data->status(), $data->json());  // <<< Tambahin ini dulu buat liat detail error
        
        return redirect()->route('matkul.index')->with('error', 'Data matkul Gagal Ditambahkan');
        
    }
    
    public function update(request $request, $kode_matkul){
        $data = Http::put("http://localhost:8080/matkul/{$kode_matkul}", [
            'kode_matkul' => $request->input('kode_matkul'),
            'nama_matkul' => $request->input('nama_matkul'),
            'sks' => $request->input('sks'),
        ]);
        if ($data->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data matkul Berhasil Diubah');
        }
        return redirect()->route('matkul.index')->with( 'error', 'Data matkul Gagal Diubah');
    }
    
    public function delete($kode_matkul){
        $data = Http::delete("http://localhost:8080/matkul/{$kode_matkul}");
        if ($data->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data matkul Berhasil Dihapus');
        }
        return redirect()->route('matkul.index')->with( 'error', 'Data matkul Gagal Dihapus');
    }
}