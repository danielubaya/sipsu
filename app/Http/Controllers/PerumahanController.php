<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active='new';
        return view('perumahan.create', compact("active"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function show(Perumahan $perumahan)
    {
        $r=$perumahan;
        //echo $r->nama_pengembang;
       return view('perumahan.show', compact("r"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perumahan $perumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perumahan $perumahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perumahan $perumahan)
    {
        //
    }


    public function permohonan_baru()
    {
        $active='Permohonan Baru';
        $rs=Perumahan::where('tahap','=','BARU')->get();
       // dd($rs);
        return view('perumahan.permohonan_baru', compact("rs","active"));
    }

    public function pembahasan_narsum()
    {
        $active='Pembahasan';
        $rs=Perumahan::where('tahap','=','PEMBAHASAN')->get();
       // dd($rs);
        return view('perumahan.pembahasan_narsum', compact("rs","active"));
    }

    public function bast_administrasi()
    {
        $active='Administrasi';
        $rs=Perumahan::where('tahap','=','ADMINISTRASI')->get();
       // dd($rs);
        return view('perumahan.bast_administrasi', compact("rs","active"));
    }

    public function bast_fisik()
    {
        $active='Fisik';
        $rs=Perumahan::where('tahap','=','FISIK')->get();
       // dd($rs);
        return view('perumahan.bast_fisik', compact("rs","active"));
    }

    public function replanning()
    {
        $active='Replanning';
        $rs=Perumahan::where('tahap','=','REPLANNING')->get();
       // dd($rs);
        return view('perumahan.replanning', compact("rs","active"));
    }

    public function penyerahan_warga()
    {
        $active='Warga';
        $rs=Perumahan::where('tahap','=','PENYERAHAN WARGA')->get();
       // dd($rs);
        return view('perumahan.penyerahan_warga', compact("rs","active"));
    }

    public function tidak_ada_kewajiban()
    {
        $active='Tidak Wajib';
        $rs=Perumahan::where('tahap','=','TIDAK ADA KEWAJIBAN')->get();
       // dd($rs);
        return view('perumahan.tidak_ada_kewajiban', compact("rs","active"));
    }

    public function lainlain()
    {
        $active='Lainlain';
        $rs=Perumahan::where('tahap','=','LAIN-LAIN')->get();
       // dd($rs);
        return view('perumahan.lainlain', compact("rs","active"));
    }

}
