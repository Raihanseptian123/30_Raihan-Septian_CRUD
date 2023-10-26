<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
        if(strlen($katakunci)){
            $data = siswa::where('nis','like',"%$katakunci%")
            ->orWhere('nama','like', "%$katakunci%")
            ->orWhere('alamat','like', "%$katakunci%")
            ->paginate();

        }else{

        
        $data = siswa::orderBy('nis','desc')->paginate();
        }

        return view('siswa')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nis',$request->nis);
        Session::flash('nama',$request->nama);
        Session::flash('jeniskelamin',$request->jeniskelamin);
        Session::flash('alamat',$request->alamat);
        $request->validate([
            'nis'=>'required|numeric|unique:siswa,nis',
            'nama'=>'required',
            'jeniskelamin'=>'required',
            'alamat'=>'required',
                  
            
            
            
        ],[
            'nis.required'=> 'NIS wajib diisi',
            'nis.numeric'=> 'NIS wajib dalam angka',
            'nis.unique'=> 'NIS yang diisikan sudah dipakai',
            'nama.required'=> 'Nama wajib diisi',
            'jeniskelamin.required'=> 'JenisKelamin wajib diisi',
           
        ]);
        $data = [
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'jeniskelamin'=>$request->jeniskelamin,
            'alamat'=>$request->alamat,
          

        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success','berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('nis',$id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'nama'=>'required',
            'jeniskelamin'=>'required',
            'alamat'=>'required',
                  
            
            
            
        ],[
           
            'nama.required'=> 'Nama wajib diisi',
            'jeniskelamin.required'=> 'jeniskelamin wajib diisi',
            'alamat.required'=> 'Alamat wajib diisi',
          
        ]);
        $data = [
            
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,

        ];
        siswa::where('nis', $id)->update($data);
        return redirect()->to('siswa')->with('success','berhasil melakukan update data data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nis',$id)->delete();
        return redirect()->to('siswa')->with('succes','Berhasil melakukan delete');
    
    }
}
