<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Contact;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {    
        //fungsi eloquent menampilkan data menggunakan pagination         
        /*$mahasiswas = Mahasiswa::all(); 
        // Mengambil semua isi tabel         
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);         
        return view('mahasiswas.index', compact('mahasiswas'));         
        with('i', (request()->input('page', 1) - 1) * 5); */
        
        //fungsi eloquent menampilkan data menggunakan pagination         
        $mahasiswas = Mahasiswa::all(); 

        //menambahkan paginate pada index
        return view('mahasiswas.users', [
        'mahasiswas' => DB::table('mahasiswa')->paginate(5)
        ]);
    }

    public function users(Request $request)
    {
        $mahasiswas = Mahasiswa::paginate(5);
        return view('mahasiswas.users', compact('mahasiswas'));
    }

    

    public function cari(\Illuminate\Http\Request $request) 
    {
        //fungsi eloquent menampilkan data menggunakan pagination         
        /*$mahasiswas = Mahasiswa::all(); 
        // Mengambil semua isi tabel         
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);         
        return view('mahasiswas.index', compact('mahasiswas'));         
        with('i', (request()->input('page', 1) - 1) * 5); */

        $keyword = $request->get('keyword');
        $mahasiswas = Mahasiswa::all(); 

        if($keyword) {
            $mahasiswas = Mahasiswa::where("Nama","LIKE","%$keyword%")->get();
        }  
        return view('mahasiswas.index', compact('mahasiswas'));  
    }

    public function create()
    {
        return view('mahasiswas.create'); 
    }

    public function store(Request $request)
    {
        //melakukan validasi data         
        $request->validate([             
            'Nim' => 'required',             
            'Nama' => 'required', 
            'Tanggal_Lahir' => 'required',
            'Email' => 'required',
            'Kelas' => 'required',             
            'Jurusan' => 'required',             
            'No_Handphone' => 'required',         
        ]); 
 
        //fungsi eloquent untuk menambah data         
        Mahasiswa::create($request->all()); 
 
        //jika data berhasil ditambahkan, akan kembali ke halaman utama         
        return redirect()->route('mahasiswas.index')             
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');   
    }

    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa         
        $Mahasiswa = Mahasiswa::find($Nim);         
        return view('mahasiswas.detail', compact('Mahasiswa'));   
    }

    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit         
        $Mahasiswa = Mahasiswa::find($Nim);         
        return view('mahasiswas.edit', compact('Mahasiswa')); 
    }

    public function update(Request $request, $Nim)
    {
        //melakukan validasi data         
         $request->validate([             
             'Nim' => 'required',             
             'Nama' => 'required', 
             'Tanggal_Lahir' => 'required',
             'Email' => 'required',            
             'Kelas' => 'required',             
             'Jurusan' => 'required',             
             'No_Handphone' => 'required', 
        ]);
         
        //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::find($Nim)->update($request->all()); 
 
        //jika data berhasil diupdate, akan kembali ke halaman utama  
        return redirect()->route('mahasiswas.index')             
            ->with('success', 'Mahasiswa Berhasil Diupdate'); 
    }

    public function destroy($Nim)
    {
       //fungsi eloquent untuk menghapus data          
       Mahasiswa::find($Nim)->delete();         
       return redirect()->route('mahasiswas.index')             
           -> with('success', 'Mahasiswa Berhasil Dihapus');  
    }
};


