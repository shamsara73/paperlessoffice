<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Undangan;
use App\Anggota;
use App\UndanganDetail;
use PDF;
use DB;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class PrintController extends Controller {

    public function printMeeting($id)
    {
        $data = Undangan::where('id',$id)->first();
        $pdf = PDF::loadView('pdf.mail', $data)->setPaper('a5')->setOrientation('landscape');
        return $pdf->download($data->meetingtitle.' @ '.$data->meetingdate.'.pdf');
    }
    public function printAbsent($id)
    {
        $datameeting = Undangan::where('id',$id)->first();
        $data = UndanganDetail::where('id',$id)->get()->toArray();
        $i = 0;
        foreach ($data as $item) {
            $member = Anggota::where('id',$item['member'])->first();
            $item['name'] = $member->nama;
            $data[$i] = $item;
            $i++;
        }
        

        $pdf = PDF::loadView('pdf.absent', compact('data'))->setPaper('a4')->setOrientation('portrait');
        return $pdf->download($datameeting->meetingtitle.' @ '.$datameeting->meetingdate.'-absent.pdf');
    }
}