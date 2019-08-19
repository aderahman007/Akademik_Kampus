<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Dosen;

class DosenController extends Controller
{
    public function json()
    {
        return DataTables::of(dosen::all())
        ->addColumn('action', function ($row) {
            $action  = '<a href="/dosen/'.$row->nidn.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'dosen/'.$row->nidn,'method'=>'delete','style'=>'float:right']);
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
        return view('dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'nidn' => 'required|unique:dosen|max:12',
            'nama' => 'required|min:6',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        $dosen = New dosen();
        $dosen->create($request->all());
        return redirect('/dosen')->with('status', 'Data dosen Berhasil Disimpan');
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
    public function edit($nidn)
    {
        $data['dosen'] = dosen::where('nidn',$nidn)->first();
        return view('dosen.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama'     => 'required|min:6',
            'email'    => 'required',
            'no_hp'    => 'required',
        ]);

        $dosen = dosen::where('nidn',"=",$nidn);
        $dosen->update($request->except('_method', '_token'));
        return redirect('dosen')->with('status', 'Data Dosen Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nidn)
    {
        $dosen = dosen::where('nidn',$nidn);
        $dosen->delete();
        return redirect('/dosen')->with('status', 'Data Dosen Berhasil di Hapus');
    }
}
