<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\ModelUser;
use App\Jabatan;
use App\Anggota;
use App\Undangan;
use App\UndanganDetail;
use Validator;
use Auth;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   public function sendMeeting($id)
   {
        //get meeting object
        //get meeting details in array
        //loop array and send all meetings to participant
        //print to pdf

        $meeting = Undangan::where('id',$id)->first();
        // echo $meeting->id;
        $meetingdetails = UndanganDetail::where('undanganid', $meeting->id)->get();
        $creator = ModelUser::where('id',$meeting->creator)->first();

        foreach ($meetingdetails as $details) {
            $member = Anggota::where('id', $details->member)->first();
            $data = array(
                'name'=>$member->nama,
                'email'=>$member->email,
                'title'=>$meeting->title,
                'creatorname'=>$creator->name,
                'datetime'=>$meeting->date,
                'location'=>$meeting->location
            );
            // echo $data['name'];
            Mail::send('layouts.mail', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['name'])->subject
                    ($data['title']);
                $message->from('dev.autoreply@gmail.com','Paperless Office');
            });

        }
        $meeting->emailsent = true;
        $meeting->save();
        return redirect('main/undangan')->with('alert-success','Email Undangan Sent');


   }
   public function sendRevisionMeeting($id)
   {
        //get meeting object
        //get meeting details in array
        //loop array and send all meetings to participant
        //print to pdf

        $meeting = Undangan::where('id',$id)->first();
        // echo $meeting->id;
        $meetingdetails = UndanganDetail::where('undanganid', $meeting->id)->get();
        $creator = ModelUser::where('id',$meeting->creator)->first();

        foreach ($meetingdetails as $details) {
            $member = Anggota::where('id', $details->member)->first();
            $data = array(
                'name'=>$member->nama,
                'email'=>$member->email,
                'title'=>$meeting->title,
                'creatorname'=>$creator->name,
                'datetime'=>$meeting->date,
                'location'=>$meeting->location
            );
            // echo $data['name'];
            Mail::send('layouts.revisionmail', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['name'])->subject
                    ('CHANGED | ' . $data['title']);
                $message->from('dev.autoreply@gmail.com','Paperless Office');
            });

        }

   }
   public function sendCanceledMeeting($id)
   {
        //get meeting object
        //get meeting details in array
        //loop array and send all meetings to participant
        //print to pdf

        $meeting = Undangan::where('id',$id)->first();
        // echo $meeting->id;
        $meetingdetails = UndanganDetail::where('undanganid', $meeting->id)->get();
        $creator = ModelUser::where('id',$meeting->creator)->first();

        foreach ($meetingdetails as $details) {
            $member = Anggota::where('id', $details->member)->first();
            $data = array(
                'name'=>$member->nama,
                'email'=>$member->email,
                'title'=>$meeting->title,
                'creatorname'=>$creator->name,
                'datetime'=>$meeting->date,
                'location'=>$meeting->location
            );
            // echo $data['name'];
            Mail::send('layouts.cancelmail', $data, function($message) use ($data)
            {
                $message->to($data['email'], $data['name'])->subject
                    ('CANCELED | '.$data['title']);
                $message->from('dev.autoreply@gmail.com','Paperless Office');
            });

        }

   }
   
   
}
