<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\PengumpulanTugas;
use App\Models\Tugas;
use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dashboard Admin
        $total_student  = User::where('role','student')->count();
        $total_teacher  = User::where('role','teacher')->count();
        $total_learning = Materi::count();

        //Dashboard Students
        $materi     = Materi::latest()->take(5)->get();
        $materi_x   = Materi::where('materi_kelas','X')->latest()->take(3)->get();
        $materi_xi  = Materi::where('materi_kelas','XI')->latest()->take(3)->get();
        $materi_xii = Materi::where('materi_kelas','XII')->latest()->take(3)->get();

        //Dashboard Teachers
        $total_done = "";
        $tugas = Tugas::latest()->take(1)->get();
        foreach($tugas as $data){
            $total_done  = PengumpulanTugas::where('task_id', $data->id)->where('status', '1')->count();
        }

        $userRole = Auth::user()->role;

        if ($userRole == "admin") {
            return view('admin.dashboard.index',compact('total_student', 'total_teacher', 'total_learning'))->with([
                'page'      => $this,
                
                $this->breadcrumbs = [
                    ['url' => '', 'title' =>'Dashboard Admin'],
                ],
            ]);
        }elseif ($userRole == "teacher"){
            return view('teachers.dashboard.index')->with([
                'page'       => $this,
                'total_done' => $total_done,
                
                $this->breadcrumbs = [
                    ['url' => '', 'title' =>'Dashboard Teachers'],
                ],
            ]);
        }elseif ($userRole == "student"){
            return view('students.dashboard.index')->with([
                'page'       => $this,
                'materi'     => $materi,
                'materi_x'   => $materi_x,
                'materi_xi'  => $materi_xi,
                'materi_xii' => $materi_xii,

                $this->breadcrumbs = [
                    ['url' => '', 'title' =>'Dashboard'],
                ],
            ]);
        }
        // return view('teachers.dashboard.index');
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
