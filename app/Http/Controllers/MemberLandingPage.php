<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLandingPage extends Controller
{
    public function MemberLP(){
        $user_account = session('AuthUser');
        return view('Members.MemberLandingPage',compact('user_account'));
    }
}
