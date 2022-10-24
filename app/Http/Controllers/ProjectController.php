<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\project;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::Paginate(5);
        $page = 'masterproject';
        return view('dashboard.project.index', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah($id)
    {
        $siswa = siswa::find($id);
        $page = 'masterproject';
        return view('dashboard.project.create', compact('page', 'siswa'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'required' => ":attribute Tidak Boleh Kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksimal :max Karakter',
            'numeric' => ':attribute Wajib di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];

        $this->validate($request, [
            'nama_project'=>'required',
        ], $message);



        // Insert Data
        project::create([
            'id_siswa'=>$request->id_siswa,
            'nama_project'=>$request->nama_project,
            'deskripsi'=>$request->deskripsi,
            'tanggal'=>$request->tanggal,

        ]);
        Session::flash('success', 'Data Berhasil Ditambahkan');
        return redirect('admin/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = siswa::find($id)->project()->get();
        $page = 'masterproject';
        // return ($project);
        return view('dashboard.project.show', compact('project', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        $siswa = siswa::find($id);
        $page = 'masterproject';
        return view('dashboard.project.edit', compact('project','siswa','page'));
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
        // $message = [
        //     'required' => ':attribute harus diisi gaess',
        //     'min' => ':attribute minimal :min karakter ya coy',
        //     'max' => 'attribute makasimal :max karakter gaess',
        //     'numeric' => ':attribute kudu diisi angka cak!!',
        //     'mimes' => 'file :attribute harus bertipe :mimes'
        // ];
        $validateData = $request->validate([
            'nama_project' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ]); //$message);

        $project = project::find($id);
        $project->nama_project = $request->nama_project;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal = $request->tanggal;
        $project->save();
        project::find($id)->update($validateData);
        Session::flash('update', 'Selamat!!! Project Anda Berhasil Diupdate');
        return redirect('admin/masterproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $siswa=project::find($id)->delete();
        // Session::flash('success', 'data berhasil dihapus !!!');
        // return redirect('admin/masterproject');
    }

    public function hapus($id)
    {
        $siswa=project::destroy($id);
        Session::flash('success', 'data berhasil dihapus !!!');
        return redirect('admin/masterproject');
    }

}
