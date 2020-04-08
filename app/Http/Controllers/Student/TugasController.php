<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use DB;
use File;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::where('tugas_kelas', \Auth::user()->kelas)->orderBy('created_at', 'DESC')->get();
        return view('students.tugas.index', compact('tugas'))->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Tugas Siswa'],
            ],
        ]);
    }

    public function detail($url)
    {
        $tugas = Tugas::where('tugas_url', $url )->firstOrFail();
        $pengumpulan = PengumpulanTugas::where('task_id', $tugas->id)->where('student_id', \Auth::user()->id)->first();
        return view('students.tugas.detail', compact('tugas','pengumpulan'))->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => './', 'title' =>'Tugas Siswa'],
                ['url' => '', 'title' =>'Details'],
            ],
        ]);
    }

    public function kirim_tugas(Request $request)
    {
        if ($request->hasfile('file_tugas'))
        {
            $file       = $request->file('file_tugas');
            $fileName   = time().'-'.$file->getClientOriginalName();
            $request->file('file_tugas')->move("files/pengumpulan_tugas", $fileName);
        }else
        {
            $fileName = "";
        }
        $tugas = Tugas::where('id', $request->id_tugas)->first();
        $data = PengumpulanTugas::where('task_id', $tugas->id)->where('student_id', \Auth::user()->id)->update([
            'file_tugas' => $fileName,
            'status'     => '1'
        ]);

        return redirect()->back()->with('alert','Success!')->with('message','Tugas berhasil dikumpulkan');
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
