<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Redirect;
use Storage;
use File;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.user')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Users Access'],
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
        return view('admin.users.add')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => './', 'title' =>'Users Access'],
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
            $data = new User();
            if(!empty($request->nip)){
                $data->nip = $request->nip;
            }
            if(!empty($request->kelas)){
                $data->kelas = $request->kelas;
            }
            $data->name         = $request->name;
            $data->email        = $request->email;
            $data->phone_number = str_replace('_','',$request->phone_number);
            $data->role         = $request->roles;
            $data->gender       = $request->gender;
            $data->password     = Hash::make($request->password);     

            /* Write log */
            $data_notif = array(
                "User Full Name"    => $request->name,
                "User Roles"        => $request->roles,
                "User Email"        => $request->email,
                "User Phone Number" => str_replace('_','',$request->phone_number),
                "User Gender"       => $request->gender
            );

            $message = "Success add new data user access with user name " . $request->name;
            createLog(json_encode($data_notif), NULL, NULL, $message, 'Save', '', 'Users');
            /* End Write Log */

            $data->save();
            DB::commit();

            return redirect()->route('user')->with('alert','Success!')->with('message','Success add new user name '.$request->name.'.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->except(['_token']))
                ->with('alert', 'Error')
                ->with('message', 'Failed add new users. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine());
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
        return view('admin.users.edit')->with([
            'page'      => $this,
            'data'      => User::findOrFail($id),

            $this->breadcrumbs = [
                ['url' => '../', 'title' =>'Users Access'],
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
            $data = User::findOrfail($id);

            /* Array Log */
            $data_old = array(
                "User Full Name"    => $data->name,
                "User Roles"        => $data->role,
                "User Email"        => $data->email,
                "User Phone Number" => $data->phone_number,
                "User Gender"       => $data->gender
            );
            /* End array log */
            $data->name         = $request->name;
            $data->email        = $request->email;
            $data->phone_number = str_replace('_','',$request->phone_number);
            $data->gender       = $request->gender;

            if (!empty($request->password_edit))
            {
                $data->password     = Hash::make($request->password_edit);   
            }

            /* Array Log */
            $data_new = array(
                "User Full Name"    => $request->name,
                "User Roles"        => $request->roles,
                "User Email"        => $request->email,
                "User Phone Number" => str_replace('_','',$request->phone_number),
                "User Gender"       => $request->gender
            );
            /* End Array Log */

            $data->save();
            DB::commit();

            /* Write Log */
            $data_change = array_diff_assoc($data_new, $data_old);
            $message     = 'Success to update data user access with user name ' . $request->name;
            createLog(json_encode($data_new), json_encode($data_old), json_encode($data_change), $message, 'Update', '', 'Users');
            /* End Write Log */

            return redirect()->route('user')->with('alert','Success!')->with('message','Success update data users '.$request->name);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->except(['_token']))
                ->with('alert', 'Error')
                ->with('message', 'Failed update user. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine());
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
        $user = User::findOrFail($request->id);
        DB::beginTransaction();
        try 
        {
            /* Write log */
            $data_notif = array(
                "User Full Name"    => $user->name,
                "User Roles"        => $user->role,
                "User Email"        => $user->email,
                "User Phone Number" => $user->phone_number,
                "User Gender"       => $user->gender
            );

            $message = "Success to delete data user access with user name " . $user->name;
            createLog(NULL, json_encode($data_notif), NULL, $message, 'Delete', '', 'Users');
            /* End Write Log */

            $user->delete();
            DB::commit();

            return json_encode(array("status" => "success", 'message' => 'Data has been deleted!'));
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array('status' => "error", 'message' => 'Failed delete data users. '.$e->getMessage().' on file '.$e->getFile().' on line '.$e->getLine()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loadTable()
    {
        $path_model   = "App\\";
        $model        = "User";
        $condition    = "role != 'admin'";
        $row          = array('id' ,'name' ,'email' ,'phone_number', 'role');
        $row_search   = array('id' ,'name' ,'email' ,'phone_number', 'role');
        $join         = "";
        $order        = "";
        $groupby      = "";
        $limit        = "";
        $offset       = "";
        $distinct     = "";
        
        return loadTableServerSide($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
    }

    public function check()
    {
        $email = $_GET['email'];
        $query = User::whereRaw('LOWER(email) = "' .strtolower($email).'"')->first();
        
        if ($query){
            return 'true';
        } else {
            return 'false';
        }
    }
}
