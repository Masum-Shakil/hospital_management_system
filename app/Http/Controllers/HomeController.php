<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::User()->usertype=='0')
            {
                $doctors=Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        if (Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctors=Doctor::all();
            return view('user.home',compact('doctors'));
        }
    }
    public function appointment(Request $req)
    {
        $appointments=new Appointment;
        $appointments->name=$req->pname;
        $appointments->email=$req->pemail;
        $appointments->date=$req->pdate;
        $appointments->doctor_selected=$req->doctor_name;
        $appointments->phone=$req->pnumber;
        $appointments->message=$req->pmessage;
        $appointments->status='In Progress';
        if(Auth::id())
        {
            $appointments->user_id=Auth::User()->id;
        }
        $appointments->save();
        return redirect()->back()->with('message','Thank You. Your appointment is submitted successfully. We will notify you soon');
    }
    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::User()->id;
            $appointments=Appointment::where('user_id',$userid)->get();
            return view('user.appointment_show',compact('appointments'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function cancel_appointment($id)
    {
        $cancel=Appointment::find($id);
        $cancel->delete();
        return redirect()->back();
    }
}
