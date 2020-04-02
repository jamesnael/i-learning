<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use File;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* get file name in logs folder */
        $month_now         = date("Y-m");
        $directory         = "log/log_activity/" . $month_now . "/";
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        
        $remove_log_       = str_replace('log_','',$scanned_directory);
        $remove_txt        = str_replace('.txt','',$remove_log_);
        $menu_name         = str_replace('_',' ',$remove_txt);
        
        return view('admin.activity-log.activity-log')->with([
            'log'  => $menu_name,
            'page' => $this,
            
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Activity Log'],
            ],
        ]);
    }

    public function view($menu_name="")
    {
        $log = contentsLog('',$menu_name);

        return view('admin.activity-log.activity-log-view')->with([
            'log'  => $log,
            'page' => $this,
            
            $this->breadcrumbs = [
                ['url' => '../', 'title' =>'Activity Log'],
                ['url' => '', 'title' =>'View List'],
            ],
        ]);
    }

    public function detail($menu_name, $id)
    {
        $log = contentsLog($id, $menu_name);

        return view('admin.activity-log.activity-log-detail')->with([
            'log'  => $log,
            'page' => $this,
            
            $this->breadcrumbs = [
                ['url' => '../../', 'title' =>'Activity Log'],
                ['url' => '../', 'title' =>'View List'],
                ['url' => '', 'title' =>'Detail Activity Log'],
            ],
        ]);
    }
}
