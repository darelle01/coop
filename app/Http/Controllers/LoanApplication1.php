<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\officialmember;


class LoanApplication1 extends Controller
{
    public function LoanApplication1(Request $request){
        $data = session('user');
        
        $AutoComplete = OfficialMember::where('member_id' , $data)->first();
        
        return view('Members.LoanApplicationPage1',compact('AutoComplete'));
    }
}
