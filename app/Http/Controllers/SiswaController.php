<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use App\Models\jenis_kontak;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $data = siswa::all();
           $page = 'Master Siswa';
           return view('dashboard.siswa.index', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.create',[
            "page" => "create siswa"
        ]);
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
            'nama'=>'required|max:30|min:7',
            'nisn'=>'required|numeric',
            'alamat'=>'required|',
            'jk'=>'required|',
            'foto'=>'required|mimes: jpg,jpeg,png',
            'about'=>'required|min:10'
        ], $message);

        // ambil informasi file yang diupload
        $file = $request->file('foto');
        // rename file foto
        $nama_file = time()."_".$file->getClientOriginalName();
        // proses upload ke direktori
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // Insert Data
        siswa::create([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk,
            'foto'=>$nama_file,
            'about'=>$request->about
        ]);
        Session::flash('success', 'Data Berhasil Ditambahkan');
        return redirect('admin/mastersiswa');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data=siswa::find($id);
        $kontak=$data->kontak()->get();
        $page='Show Siswa';
        // return ($kontak);
        return view('dashboard.siswa.show', compact('data', 'kontak', 'page'));


        // return [
        //     "page" => "showsiswa",
        //     "data" => siswa::find($id),
        //     "kontak" => siswa::find($id)->kontak()->get()
        // ];


        // // ,[
        // //     "page" => "showsiswa",
        // //     "data" => siswa::find($id),
        // //     "kontak" => siswa::find($id)->kontak()->get()
        // // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswa::find($id);
        $page = 'Master Siswa';
        return view('dashboard.siswa.edit', compact('siswa', 'page'));
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
        $message = [
            'required' => ":attribute Tidak Boleh Kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksimal :max Karakter',
            'numeric' => ':attribute Wajib di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];
        $this->validate($request, [
            'nama'=>'required|max:30|min:7',
            'nisn'=>'required|numeric',
            'alamat'=>'required',
            'jk'=>'required',
            'foto'=>'mimes:jpg,jpeg,png',
            'about'=>'required|min:10'
        ], $message);

        if ($request->file('foto')) {
            // ambil informasi file yang diupload
        $hosuoyu = Siswa::find($id);
        $hapus = File::delete($hosuoyu->foto);
        $file = $request->file('foto');
        // Hapus gambar dahilu

        // rename file foto
        $nama_file = time()."_".$file->getClientOriginalName();
        // proses upload ke direktori
        $tujuan_upload = './template/img';

        $file->move($tujuan_upload, $nama_file);
        siswa::find($id)->update([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk,
            'foto'=>$nama_file,
            'about'=>$request->about
        ]);

        } else {
             siswa::find($id)->update([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk,
            'about'=>$request->about
        ]);
        }




        // Insert Data

        Session::flash('success', 'Data Berhasil Ditambahkan');
        return redirect('admin/mastersiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id)
    {
        $siswa=Siswa::find($id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect('admin/mastersiswa');
    }
}
