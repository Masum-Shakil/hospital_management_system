<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendMailNotification;

class AdminController extends Controller
{
    public function add_doctors_view()
    {
        return view('admin.add_doctor');
    }
    public function upload_doctor(Request $req)
    {
        $data=new Doctor;
        $image=$req->dimage;
        $doctorimage=time().".".$image->getClientOriginalExtension();
        $image->move('doctorimage',$doctorimage);
        $data->dimage=$doctorimage;
        $data->dname=$req->dname;
        $data->dphone=$req->dphone;
        $data->dspeciality=$req->dspeciality;
        $data->droom=$req->droom;
        $data->save();
        return redirect()->back()->with('message',$req->dname." is Added Successfully in the Database!");
    }
    public function appointment_view()
    {
        $appointments=Appointment::all();
        return view('admin.appointment_view',compact('appointments'));
    }
    public function appointment_approve($id)
    {
        $appt=Appointment::find($id);
        $appt->status="Approved";
        $appt->save();
        return redirect()->back();
    }
    public function appointment_cancel($id)
    {
        $appt=Appointment::find($id);
        $appt->status="Cancelled";
        $appt->save();
        return redirect()->back();
    }
    public function all_doctors()
    {
        $doctors=Doctor::all();
        return view('admin.all_doctors',compact('doctors'));
    }
    public function doctor_delete($id)
    {
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }
    public function doctor_update($id)
    {
        $doctor=Doctor::find($id);
        return view('admin.doctor_update',compact('doctor'));
    }
    public function update_doctor(Request $req,$id)
    {
        $doctor=Doctor::find($id);
        $image=$req->ndimage;
        if($image)
        {
            $iname=time().'.'.$image->getClientOriginalExtension();
            $image->move('doctorimage',$iname);
            $doctor->dimage=$iname;
        }
        $doctor->dname=$req->ndname;
        $doctor->dphone=$req->ndphone;
        $doctor->dspeciality=$req->ndspeciality;
        $doctor->droom=$req->ndroom;
        $doctor->save();
        return redirect()->back()->with('message',"The information of the doctor is updated");
    }
    public function email_view($id)
    {
        $appointment=Appointment::find($id);
        return view('admin.email_view',compact('appointment'));
    }
    public function sendemail(Request $req,$id)
    {
        $data=Appointment::find($id);
        $details=['greeting'=>$req->greeting,'body'=>$req->body,'actiontext'=>$req->actiontext,'actionurl'=>$req->actionurl,'endpart'=>$req->endpart];
        Notification::send($data,new SendMailNotification($details));
        return redirect()->back()->with('message',"The mail is sent");
    }
}
