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
            $data->view_count   = '0';
            $data->teacher_id   = Auth::user()->id;

            //Thumbnail Image
            if($request->materi_mapel == 'Matematika'){
                $data->thumbnail_image = 'mtk.png';
            }elseif($request->materi_mapel == 'B.Indonesia'){
                $data->thumbnail_image = 'bindo.png';
            }elseif($request->materi_mapel == 'B.Inggris'){
                $data->thumbnail_image = 'inggris.png';
            }elseif($request->materi_mapel == 'Produktif'){
                $data->thumbnail_image = 'prod.png';
            }

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
        $data = Materi::findOrFail($id);
        return view('teachers.materi.edit')->with([
            'page'  => $this,
            'data'  => $data,

            $this->breadcrumbs = [
                ['url' => '../', 'title' =>'Materi'],
                ['url' => '', 'title' =>'Edit'],
            ],
        ]);
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
        DB::beginTransaction();
        try 
        {
            $data = Materi::findOrfail($id);

            /* Array Log */
            $data_old = array(
                "Judul Materi"       => $data->judul_materi,
                "Mapel Materi"       => $data->materi_mapel,
                "Materi Untuk Kelas" => $data->materi_kelas,
                "Isi Materi"         => $data->isi_materi,
            );
            /* End array log */

            $data->judul_materi = $request->judul_materi;
            $data->materi_url   = slug($request->judul_materi);
            $data->materi_mapel = $request->materi_mapel;
            $data->materi_kelas = $request->materi_kelas;
            $data->isi_materi   = $request->isi_materi;

            //Thumbnail Image
            if($request->materi_mapel == 'Matematika'){
                $data->thumbnail_image = 'mtk.png';
            }elseif($request->materi_mapel == 'B.Indonesia'){
                $data->thumbnail_image = 'bindo.png';
            }elseif($request->materi_mapel == 'B.Inggris'){
                $data->thumbnail_image = 'inggris.png';
            }elseif($request->materi_mapel == 'Produktif'){
                $data->thumbnail_image = 'prod.png';
            }
            
            /* Array Log */
            $data_new = array(
                "Judul Materi"       => $request->judul_materi,
                "Mapel Materi"       => $request->materi_mapel,
                "Materi Untuk Kelas" => $request->materi_kelas,
                "Isi Materi"         => $request->isi_materi,
            );
            /* End Array Log */

            $data->save();
            DB::commit();

            /* Write Log */
            $data_change = array_diff_assoc($data_new, $data_old);
            $message     = 'Success to update materi with materi title ' . $request->judul_materi;
            createLog(json_encode($data_new), json_encode($data_old), json_encode($data_change), $message, 'Update', '', 'Materi');
            /* End Write Log */

            return redirect()->route('materi')->with('alert','Success!')->with('message','Success update materi '.$request->event_title);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->except(['_token']))
                ->with('alert', 'Error')
                ->with('message', 'Failed update materi. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine());
        }
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
        $row          = array('id' ,'judul_materi', 'materi_url' ,'materi_mapel' ,'materi_kelas' , 'isi_materi', 'view_count', 'created_at');
        $row_search   = array('id' ,'judul_materi', 'materi_url' ,'materi_mapel' ,'materi_kelas' , 'isi_materi', 'view_count', 'created_at');
        $join         = "";
        $order        = "";
        $groupby      = "";
        $limit        = "";
        $offset       = "";
        $distinct     = "";
        
        return loadTableServerSide($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
    }
}
