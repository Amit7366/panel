<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index(){
                 $websites = DB::table('domains')->where('user_id',auth()->user()->id)->get();
        $domains = DB::table('domains')->where('user_id',auth()->user()->id)->count();

        $emails = DB::table('emails')->where('user-id',auth()->user()->id)->where('email','!=','')->count();


        $click = DB::table('domains')
            ->where('user_id',auth()->user()->id)
            ->sum('domains.click');
            
         $mobile = DB::table('domains')
          ->where('user_id',auth()->user()->id)
            ->sum('domains.mobile');
            $tablet = DB::table('domains')
             ->where('user_id',auth()->user()->id)
            ->sum('domains.tablet');
            $desktop = DB::table('domains')
             ->where('user_id',auth()->user()->id)
            ->sum('domains.desktop');    
        return view('auth.dashboards.users.index',compact('domains','emails','click','websites','mobile','tablet','desktop'));

    }
    function informations(){
        $informations = DB::table('emails')->where('user-id',auth()->user()->id)->where('email','!=','')->orderBy('id','desc')->get();
        return view('auth.dashboards.users.informations',compact('informations'));
    }
    function websites(){
        $websites = DB::table('domains')
       ->where('user_id',auth()
        ->user()->id)
        ->get();
        return view('auth.dashboards.users.websites',compact('websites'));
    }

}
