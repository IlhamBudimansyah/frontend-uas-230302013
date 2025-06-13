<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MahasiswaController extends Controller
{
    
    public function index(){
        $response = Http::get('http://localhost:8080/mahasiswa');
        
        if (!$response->successful()) {
            return view('mahasiswa.index', ['mahasiswa' => []]);
        }
        
        $json = $response->json();
        $data = is_array($json) ? $json : [];
        
        return view('mahasiswa.index', ['mahasiswa' => $data]);
    }
    
    
    
    public function create()
    {
        return view('mahasiswa.create');
    }
    
    
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_mahasiswa' => 'required',
            'npm' => 'required',
            'email' => 'required|email',
        ]);
        
        // Siapkan payload JSON
        $payload = [
            'npm' => $request->input('npm'),
            'nama_mahasiswa' => $request->input('nama_mahasiswa'),
            'email' => $request->input('email')
        ];
        
        // Kirim POST ke API CI
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            ])->post('http://localhost:8080/mahasiswa', $payload);
            
            
            // Cek apakah berhasil
            if ($response->successful()) {
                return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
            }
            
            dd($response->json());
            
            // Kalau gagal, tampilkan isi response-nya
            return back()->withErrors(['api_error' => $response->json()['message']])->withInput();
        }
        
        
        
        public function update(Request $request, $npm){
            $data = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                ])->put("http://localhost:8080/mahasiswa/{$npm}", [
                    'npm' => $request->input('npm'),
                    'nama_mahasiswa' => $request->input('nama_mahasiswa'),
                    'email' => $request->input('email'), 
                ]);
                
                if ($data->successful()) {
                    return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Diubah');
                }
                
                // Debug jika gagal
                dd($data->body());
                
                return redirect()->route('mahasiswa.index')->with('error', 'Data Mahasiswa Gagal Diubah');
            }            
            
            public function delete($npm){
                $data = Http::delete("http://localhost:8080/mahasiswa/{$npm}");
                if ($data->successful()) {
                    return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Dihapus');
                }
                return redirect()->route('mahasiswa.index')->with( 'error', 'Data Mahasiswa Gagal Dihapus');
            }
        }