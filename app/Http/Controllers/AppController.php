<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function checkInfo() {
        return view("pages.check-info");
    }

    public function registerInfo(){
        return view("pages.register-info");
    }

    public function userInfo($employeeId){
        $user = User::where('employee_id', $employeeId)->first();
        return view("pages.user-info", ['user' => $user]);
    }


}
