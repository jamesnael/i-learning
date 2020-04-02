<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Materi;
use DB;
use Redirect;
use Storage;
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
        return view('teachers.materi.materi')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Materi'],
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
        return view('teachers.materi.add')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => './', 'title' =>'Materi'],
                ['url' => '', 'title' =>'Create'],
            ],
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
        DB::beginTransaction();
        try 
        {
            $data = new Materi();
            $data->judul_materi = $request->judul_materi;
            $data->materi_url   = slug($request->judul_materi);
            $data->materi_mapel = $request->materi_mapel;
            $data->materi_kelas = $request->materi_kelas;
            $data->isi_materi   = $request->isi_materi;
            $data->teacher_id   = Auth::user()->id;

            /* Write log */
            $data_notif = array(
                "Judul Materi"       => $request->judul_materi,
                "Mapel Materi"       => $request->materi_mapel,
                "Materi Untuk Kelas" => $request->materi_kelas,
                "Isi Materi"         => $request->isi_materi,
            );

            $message = "Success add new materi with materi title " . $request->judul_materi;
            createLog(json_encode($data_notif), NULL, NULL, $message, 'Save', '', 'Materi');
            /* End Write Log */

            $data->save();
            DB::commit();

            return redirect()->route('materi')->with('alert','Success!')->with('message','Success add new materi '.$data->judul_materi.'.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->except(['_token']))
                ->with('alert', 'Error')
                ->with('message', 'Failed add new materi. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine());
        }
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
    public function destroy(Request $request)
    {
        $materi = Materi::findOrFail($request->id);
        DB::beginTransaction();
        try {   
            $materi->delete();
            DB::commit();

            /* Write log */

            $data_notif = array(
                "Judul Materi"       => $materi->judul_materi,
                "Mapel Materi"       => $materi->materi_mapel,
                "Materi Untuk Kelas" => $materi->materi_kelas,
                "Isi Materi"         => $materi->isi_materi,
            );

            $message = "Success to delete materi with materi title " . $materi->judul_materi;
            createLog(NULL, json_encode($data_notif), NULL, $message, 'Delete', '', 'Materi');
            /* End Write Log */

            return json_encode(array("status" => "success", 'message' => 'Data has been deleted!'));
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array('status' => "error", 'message' => 'Failed delete materi . '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine()));
        }
    }

    public function loadTable()
    {
        $path_model   = "App\Models\\";
        $model        = "Materi";
        $condition    = "teacher_id = '".Auth::user()->id."'";
        $row          = array('id' ,'judul_materi', 'materi_url' ,'materi_mapel' ,'materi_kelas' , 'isi_materi', 'created_at');
        $row_search   = array('id' ,'judul_materi', 'materi_url' ,'materi_mapel' ,'materi_kelas' , 'isi_materi', 'created_at');
        $join         = "";
        $order        = "";
        $groupby      = "";
        $limit        = "";
        $offset       = "";
        $distinct     = "";
        
        return loadTableServerSide($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
    }
}
