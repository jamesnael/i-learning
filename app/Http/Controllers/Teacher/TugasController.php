<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use App\User;
use DB;
use Redirect;
use Storage;
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
        return view('teachers.tugas.tugas')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Tugas'],
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
        return view('teachers.tugas.add')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => './', 'title' =>'Tugas'],
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
            if ($request->hasfile('file_upload'))
            {
                $file       = $request->file('file_upload');
                $fileName   = time().'-'.$file->getClientOriginalName();
                $request->file('file_upload')->move("files/tugas", $fileName);

            }else
            {
                $fileName = "";
            }

            $data = new Tugas();
            $data->judul_tugas    = $request->judul_tugas;
            $data->tugas_url      = slug($request->judul_tugas);
            $data->tugas_mapel    = $request->tugas_mapel;
            $data->tugas_kelas    = $request->tugas_kelas;
            $data->isi_tugas      = $request->isi_tugas;
            $data->deadline_tugas = date('y-m-d', strtotime($request->deadline_tugas));
            $data->file_tugas     = $fileName;
            $data->teacher_id     = Auth::user()->id;

            /* Write log */
            $data_notif = array(
                "Judul Tugas"       => $request->judul_tugas,
                "Mapel Tugas"       => $request->tugas_mapel,
                "Tugas Untuk Kelas" => $request->tugas_kelas,
                "Isi Tugas"         => $request->isi_tugas,
                "Deadline Tugas"    => date('d F Y', strtotime($request->deadline_tugas)),
                "File Tugas"        => $fileName,
            );

            $message = "Success add new tugas with name " . $request->judul_tugas;
            createLog(json_encode($data_notif), NULL, NULL, $message, 'Save', '', 'Tugas');
            /* End Write Log */

            $data->save();
            $student = User::where('role', 'student')->where('kelas', $request->tugas_kelas)->get();
            foreach($student as $students)
            {
                PengumpulanTugas::Create([
                    'student_id' => $students->id,
                    'task_id'    => $data->id,
                    'status'     => '0'
                ]);
            }
            DB::commit();

            return redirect()->route('tugas')->with('alert','Success!')->with('message','Success add new tugas '.$data->judul_tugas.'.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->except(['_token']))
                ->with('alert', 'Error')
                ->with('message', 'Failed add new tugas. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine());
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
        $data = Tugas::findOrFail($id);
        return view('teachers.tugas.edit')->with([
            'page'  => $this,
            'data'  => $data,

            $this->breadcrumbs = [
                ['url' => '../', 'title' =>'Tugas'],
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
            $data = Tugas::findOrfail($id);

            /* Array Log */
            $data_old = array(
                "Judul Tugas"       => $data->judul_tugas,
                "Mapel Tugas"       => $data->tugas_mapel,
                "Tugas Untuk Kelas" => $data->tugas_kelas,
                "Isi Tugas"         => $data->isi_tugas,
                "Deadline Tugas"    => date('d F Y', strtotime($data->deadline_tugas)),                
                "File Tugas"        => $data->file_tugas,
            );
            /* End array log */
            if ($request->hasfile('file_upload'))
            {
                $file       = $request->file('file_upload');
                $fileName   = time().'-'.$file->getClientOriginalName();
                $request->file('file_upload')->move("files/tugas", $fileName);

            }else
            {
                $fileName = $data->file_tugas;
            }

            $data->judul_tugas    = $request->judul_tugas;
            $data->tugas_url      = slug($request->judul_tugas);
            $data->tugas_mapel    = $request->tugas_mapel;
            $data->tugas_kelas    = $request->tugas_kelas;
            $data->isi_tugas      = $request->isi_tugas;
            $data->deadline_tugas = date('y-m-d', strtotime($request->deadline_tugas));
            $data->file_tugas     = $fileName;

            /* Array Log */
            $data_new = array(
                "Judul Tugas"       => $request->judul_tugas,
                "Mapel Tugas"       => $request->tugas_mapel,
                "Tugas Untuk Kelas" => $request->tugas_kelas,
                "Isi Tugas"         => $request->isi_tugas,
                "Deadline Tugas"    => date('d F Y', strtotime($request->deadline_tugas)),
                "File Tugas"        => $fileName,
            );
            /* End Array Log */

            $data->save();
            DB::commit();

            /* Write Log */
            $data_change = array_diff_assoc($data_new, $data_old);
            $message     = 'Success to update tugas with name ' . $request->judul_tugas;
            createLog(json_encode($data_new), json_encode($data_old), json_encode($data_change), $message, 'Update', '', 'Tugas');
            /* End Write Log */

            return redirect()->route('tugas')->with('alert','Success!')->with('message','Success update tugas '.$request->event_title);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->except(['_token']))
                ->with('alert', 'Error')
                ->with('message', 'Failed update tugas. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine());
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
        $tugas = Tugas::findOrFail($request->id);
        DB::beginTransaction();
        try {   
            $tugas->delete();
            DB::commit();

            /* Write log */

            $data_notif = array(
                "Judul Tugas"       => $tugas->judul_tugas,
                "Mapel Tugas"       => $tugas->tugas_mapel,
                "Tugas Untuk Kelas" => $tugas->tugas_kelas,
                "Isi Tugas"         => $tugas->isi_tugas,
                "Deadline Tugas"    => date('d F Y', strtotime($tugas->deadline_tugas)),                
                "File Tugas"        => $tugas->file_tugas,
            );

            $message = "Success to delete tugas with name " . $tugas->judul_tugas;
            createLog(NULL, json_encode($data_notif), NULL, $message, 'Delete', '', 'Tugas');
            /* End Write Log */

            return json_encode(array("status" => "success", 'message' => 'Data has been deleted!'));
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array('status' => "error", 'message' => 'Failed delete tugas . '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine()));
        }
    }

    public function loadTable()
    {
        $path_model   = "App\Models\\";
        $model        = "Tugas";
        $condition    = "teacher_id = '".Auth::user()->id."'";
        $row          = array('id' ,'judul_tugas', 'tugas_url' ,'tugas_mapel' ,'tugas_kelas' , 'isi_tugas', 'deadline_tugas' , 'file_tugas' , 'created_at');
        $row_search   = array('id' ,'judul_tugas', 'tugas_url' ,'tugas_mapel' ,'tugas_kelas' , 'isi_tugas', 'deadline_tugas' , 'file_tugas' , 'created_at');
        $join         = "";
        $order        = "created_at";
        $groupby      = "";
        $limit        = "";
        $offset       = "";
        $distinct     = "";
        
        return loadTableServerSide($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
    }

    public function jsonTugasFinish(Request $request)
    {
        $tugas = PengumpulanTugas::where('task_id',$request->id)->where('status','1')->get();
        if($tugas == '[]'){
            echo "
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Students Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='text-center' colspan='3'>No Results Data</td>
                    </tr>
                </tbody>
                ";
        }else{
            foreach($tugas as $data){
                echo "
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Students Name</th>
                            <th>Status</th>
                            <th class='text-center'>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            ";
                            if(!empty($data->user->photo)){
                                echo "<td class='align-middle' width='75'><img width='40' src='../images/user_photo/".$data->user->photo."' class='m--img-rounded m--marginless m--img-centered' alt=''></td>";
                            }else{
                                echo "<td class='align-middle' width='75'><img width='40' src='../assets/no_image.png' class='m--img-rounded m--marginless m--img-centered' alt=''></td>";
                            }
                            echo"
                            <td class='align-middle'>".$data->user->name."</td>
                            <td class='align-middle'><label class='text-success'>Finished</label></td>
                            <td class='align-middle text-center'><a href='../files/pengumpulan_tugas/".$data->file_tugas."'><i class='fa fa-download'></i></a></td>
                        </tr>
                    </tbody>
                    ";
            }
        }
    }

    public function jsonTugasUnfinish(Request $request)
    {
        $tugas = PengumpulanTugas::where('task_id',$request->id)->where('status','0')->get();
        if($tugas == '[]'){
            echo "
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Students Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='text-center' colspan='3'>No Results Data</td>
                    </tr>
                </tbody>
                ";
        }else{
            foreach($tugas as $data){
                echo "
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Students Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            ";
                            if(!empty($data->user->photo)){
                                echo "<td class='align-middle' width='75'><img width='40' src='../images/user_photo/".$data->user->photo."' class='m--img-rounded m--marginless m--img-centered' alt=''></td>";
                            }else{
                                echo "<td class='align-middle' width='75'><img width='40' src='../assets/no_image.png' class='m--img-rounded m--marginless m--img-centered' alt=''></td>";
                            }
                            echo"
                            <td class='align-middle'>".$data->user->name."</td>
                            <td class='align-middle'><label class='text-danger'>Unfinished</label></td>
                        </tr>
                    </tbody>
                    ";
            }
        }
    }
}
