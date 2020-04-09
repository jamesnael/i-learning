<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use DB;
use File;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi     = Materi::latest()->get();
        $materi_x   = Materi::where('materi_kelas','X')->latest()->get();
        $materi_xi  = Materi::where('materi_kelas','XI')->latest()->get();
        $materi_xii = Materi::where('materi_kelas','XII')->latest()->get();

        return view('students.materi.index')->with([
            'page'      => $this,
            'materi'     => $materi,
            'materi_x'   => $materi_x,
            'materi_xi'  => $materi_xi,
            'materi_xii' => $materi_xii,
                
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Materi'],
            ],
        ]);
    }

    public function detail($url)
    {
        $materi = Materi::where('materi_url', $url)->firstOrFail();
        $materi->increment('view_count');
        $populer = Materi::orderBy('view_count','DESC')->take(3)->get();

        return view('students.materi.detail', compact('materi', 'populer'))->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => './', 'title' =>'Materi'],
                ['url' => '', 'title' =>'Details'],
            ],
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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
}
