<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAkademik;
use DataTables;

class TahunakademikController extends Controller
{
    public function json()
    {
        return DataTables::of(TahunAkademik::all())
        ->addColumn('action', function ($row) {
            $action  = '<a href="/tahunakademik/'.$row->kode_tahun_akademik.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'tahunakademik/'.$row->kode_tahun_akademik,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
            $action .= \Form::close();
            return $action;
        })
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tahun_akademik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun_akademik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_tahun_akademik' => 'required|unique:tahun_akademik|max:10',
            'nama_tahun_akademik' => 'required|min:4',
        ]);
        $tahun_akademik = New TahunAkademik();
        $tahun_akademik->create($request->all());
        return redirect('/tahunakademik')->with('status', 'Data Tahun Akademik Berhasil Disimpan');
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
    public function edit($id)
    {
        $data['tahun_akademik'] = TahunAkademik::where('kode_tahun_akademik',$id)->first();
        return view('tahun_akademik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_tahun_akademik)
    {
        $request->validate([
            'nama_tahun_akademik'     => 'required|min:4',
        ]);

        $tahun_akademik = TahunAkademik::where('kode_tahun_akademik',"=",$kode_tahun_akademik);
        $tahun_akademik->update($request->except('_method', '_token'));
        return redirect('tahunakademik')->with('status', 'Data tahun_akademik Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_tahun_akademik)
    {
        $tahun_akademik = TahunAkademik::where('kode_tahun_akademik',$kode_tahun_akademik);
        $tahun_akademik->delete();
        return redirect('/tahunakademik')->with('status', 'Data tahun_akademik Berhasil Di Hapus');
    }
}
