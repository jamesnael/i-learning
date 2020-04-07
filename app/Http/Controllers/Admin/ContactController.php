<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use DB;
use Redirect;
use Storage;
use File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contact.contact')->with([
            'page'      => $this,
            
            $this->breadcrumbs = [
                ['url' => '', 'title' =>'Contacts'],
            ],
        ]);
    }

    public function loadTable()
    {
        $path_model   = "App\Models\\";
        $model        = "Contact";
        $condition    = "";
        $row          = array('id' ,'name', 'email' ,'phone_number' ,'subject' , 'message', 'created_at');
        $row_search   = array('id' ,'name', 'email' ,'phone_number' ,'subject' , 'message', 'created_at');
        $join         = "";
        $order        = "";
        $groupby      = "";
        $limit        = "";
        $offset       = "";
        $distinct     = "";
        
        return loadTableServerSide($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
    }

    public function jsonContact(Request $request)
    {
        $contact = Contact::where('id',$request->id)->first();
        echo "
            <tr>
                <td width='300'>Sender Name</td>
                <td width='50'>:</td>
                <td>".$contact->name."</td>
            </tr>
            <tr>
                <td>Submitted Date</td>
                <td>:</td>
                <td>".date('d F Y', strtotime($contact->created_at))."</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td>".$contact->phone_number."</td>
            </tr>
            <tr>
                <td>Email Sender</td>
                <td>:</td>
                <td>".$contact->email."</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>:</td>
                <td>".$contact->subject."</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>:</td>
                <td>".$contact->message."</td>
            </tr>";
    }
}
