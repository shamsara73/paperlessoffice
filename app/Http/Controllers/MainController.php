<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelUser;
use App\Jabatan;
use App\Anggota;
use App\Undangan;
use App\UndanganDetail;

use Validator;
use Auth;
use DB;

class MainController extends Controller
{
    function index()
    {
        return view('pages.login');
     
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('home');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    

    function successlogin()
    {
        $meeting = (int)count(Undangan::all()->toArray());
        $member = (int)count(Anggota::all()->toArray());
        $data = array(
            'undangan'=>$meeting,
            'anggota'=>$member
        );
        return view('pages.dashboard',compact('data'));
    }

    function profil()
    {
        return view('pages.profil');
    }
    

    function logout()
    {
        Auth::logout();
        return view('pages.login');
    }
    function storemeeting(Request $request)
    {
        $user = Auth::user();
        
        $month = (int)date("m");
        $year = (int)date("Y");
        $searchparam = $year.'-'.$month.'%';
        $count = count(Undangan::where('created_at', 'like', $searchparam)->get()->toArray());
        $count++;
        $roman = "I";
        switch ($month) {
            case 1:
                $roman = "I";
            case 2:
                $roman = "II";
            case 3:
                $roman = "III";
            case 4:
                $roman = "IV";
            case 5:
                $roman = "V";
            case 6:
                $roman = "VI";
            case 7:
                $roman = "VII";
            case 8:
                $roman = "VIII";
            case 9:
                $roman = "IX";
            case 10:
                $roman = "X";
            case 11:
                $roman = "XI";
            case 12:
                $roman = "XII";
            default:
                # code...
                break;
        }
        $legalno = date("Y")."/"."POFFICE"."/".$roman ."/".$count;
        $data = new Undangan([
            'creator'     => $user->id ,
            'legalno' => $legalno,
            'title'     =>  $request->get('title'),
            'date'     =>  $request->get('date'),
            'location'     =>  $request->get('loc'),
            'description'     =>  $request->get('desc'),
            'emailsent'     => false

        ]);
        if($data->save())
        {
            // legal format 2018/POFFICE/XII/1


            foreach ($request->get('states') as $item) {
                $details = new UndanganDetail([
                    'undanganid'     => $data->id,
                    'member'        => $item,
                    'attendance'   => false
                ]);
                $details->save();
            }
        }
        // $data->save();
        
        return redirect('main/undangan')->with('alert-success','New Undangan Added');
    }


    function register(Request $request){
        return view('pages.register');
    }
   
    
    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('pages.login')->with('alert-success','Kamu berhasil Register');
    }
    function jabatan()
    {
        $jabatans = Jabatan::all()->toArray();
        return view('pages.jabatan', compact('jabatans'));
    }

    public function storeJabatan(Request $request)
    {
        $jabatans = Jabatan::all();
        $exist = false;
        foreach ($jabatans as $item) {
            if($item->jabatan == $request->get('jabatan'))
            {
                $exist = true;
            }
        }
        if(!$exist)
        {
            $datajabatan = new Jabatan([
                'jabatan'     =>  $request->get('jabatan')
            ]);
            $datajabatan->save();
            return redirect('main/jabatan') ->with('alert-success','Kamu berhasil Register');
        }else{
            return back()->with('error', 'Jabatan sudah ada');
        }
        

    }
    public function destroyJabatan($id)
    {

        $jabatans = Jabatan::find($id);
        $jabatans->delete();
        return redirect('main/jabatan') ->with('alert-success','Kamu berhasil Delete');;

    }

    public function anggota()
    {
        $jabatans = Jabatan::all()->toArray();
        $anggotas = Anggota::all()->toArray();
        return view('pages.partisipan', compact('anggotas'), compact('jabatans'));
    }

    public function tambahpartisipan()
    {
        $jabatans = Jabatan::all()->toArray();
        return view('pages.tambahpartisipan', compact('jabatans'));
    }

    public function tambahjabatan()
    {
        return view('pages.tambahjabatan');
    }

    public function tambahundangan()
    {
        $anggotas = Anggota::all()->toArray();
        return view('pages.tambahundangan',compact('anggotas'));
    }

    public function storeanggota(Request $request)
    {
        $dataanggota = new Anggota([
            'nama'     =>  $request->get('nama'),
            'email'     =>  $request->get('email'),
            'jabatan'     =>  $request->get('jabatan')
        ]);
        $dataanggota->save();
        return redirect('main/anggota') ->with('alert-success','Kamu berhasil Register');;

    }
    
    public function destroyanggota($id)
    {

        $anggotas = Anggota::find($id);
        $anggotas->delete();
        return redirect('main/anggota') ->with('alert-success','Kamu berhasil Delete');;
    }

    public function registerCancelPost(Request $request){
        
        return redirect('main');
    }

    public function undangan()
    {
        $meetings = Undangan::all()->toArray();
        $i = 0;
        foreach ($meetings as $item) {
            $details = UndanganDetail::where('undanganid' , $item['id'])->get();
            $attendances = '';
            foreach ($details as $det) {
                $member = Anggota::where('id',$det->member)->first();
                $attendances .= $member->nama . ' | ';
            }
            $item['attendances'] = $attendances;
            $meetings[$i] = $item;
            $i++;
        }
        return view('pages.undangan', compact('meetings'));
    }
}



?>
