<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PuntajesModel;
class DashboardController extends Controller{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1){
            return view('admin.menu', $data);
         }
         else if(Auth::user()->user_type == 2){
            return view('teacher.dashboard', $data);
         }
         else if(Auth::user()->user_type == 3){
            $data['puntajes'] = PuntajesModel::all();
            return view('player.game', $data);
         }
         else if(Auth::user()->user_type == 4){
            return view('parent.dashboard', $data);
         }
    }
}
