<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;
use File;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.user-profile.index')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                [
                    'url'      => '', 
                    'title'    =>'Profile'
                ],
            ],
        ]);
    }

    /**
     * Change Profile Picture
     *
     * @return \Illuminate\Http\Response
     */
    public function change_profile_picture(Request $request)
    {
        if($request->ajax())
        {   
            // return $request->all();
            $id_user = Auth::user()->id;

            /* Check */
            $check = User::where('id', $id_user)->first();
            
            if(!empty($check)) {

                DB::beginTransaction();
                
                try {

                    $data = User::findOrfail($id_user);

                    if($request->hasFile('profile_photo'))
                    {   
                        $destinationPath = public_path('images/user_photo/');
                        
                        if(file_exists($destinationPath . $data->photo))
                        {
                            // unlink($destinationPath . $data->photo);
                            $input                         = $request->file('profile_photo');
                            $fileName                      = time().'.'.$input->getClientOriginalExtension(); // original name that it was uploaded with
                        }
                        else
                        {
                            $input           = $request->file('profile_photo');
                            $fileName        = time().'.'.$input->getClientOriginalExtension(); // original name that it was uploaded with
                        }

                        $uploadfile = $input->move($destinationPath,$fileName); // moving the file to specified dir with the original name
                        
                        $data->photo = $fileName;
                        
                        $data->save();

                        DB::commit();

                        $status = array('status' => 'success', 'messages' => 'Profile Photo Changed');
                    }
                    else
                    {
                        $status = array('status' => 'error', 'messages' => 'File Not Found');
                    }
                }
                catch (\Exception $e) {
                    DB::rollBack();

                    $status = array('status' => 'error', 'messages' => 'Failed To Change Profile Photo'.$e);
                }
            }
            else
            {
                $status = array('status' => 'error', 'messages' => 'Data Not Found');
            }

            $data = $status;
            return response()->json($data);
        }
    }

    /**
     * Change Profile Information
     *
     * @return \Illuminate\Http\Response
     */
    public function change_profile_information(Request $request) 
    {
        if($request->ajax())
        {
            $id_user = Auth::user()->id;

            $check = User::findOrfail($id_user);

            if(!empty($check))
            {
                DB::beginTransaction();

                $data = User::findOrfail($id_user);

                try {
                    $data->name         = $request->full_name;
                    $data->address      = $request->address;
                    $data->gender       = ($request->gender == 'L') ? 'L' : 'P';
                    $data->phone_number = str_replace('_','',$request->phone_number);

                    $data->save();

                    DB::commit();

                    $status = array('status' => 'success', 'messages' => 'Profile Information Updated');
                }
                catch (\Exception $e) {
                    DB::rollBack();
                    
                    $status = array('status' => 'error', 'messages' => 'Profile Information Failed to Update');
                }
            }
            else
            {
                $status = array('status' => 'error', 'messages' => 'Data Not Found');
            }
            
            $data = $status;
            return response()->json($data);
        }
    }
    
    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request) 
    {
        if($request->ajax()) 
        {   
            /* Auth Login User */
            $id_user   = Auth::user()->id;
            
            /* POST DATA */
            $password  = $request->password;
            $rpassword = $request->password_confirmation;

            if($password == $rpassword)
            {   
                DB::beginTransaction();

                try {
                    $user = User::findOrfail($id_user);
                    $user->password = Hash::make($password);
                    $user->save();
                    DB::commit();

                    $status = array('status' => 'success', 'messages' => 'Success To Update Password');
                }
                catch (\Exception $e) {
                    DB::rollBack();
                    
                    $status = array('status' => 'error', 'messages' => 'Failed To Update Password');
                }

                $data = $status;
                return response()->json($data);
            }
        }
    }
}
