<?php

namespace App\Http\Controllers;

use App\Models\OfficialMember;
use Illuminate\Http\Request;

class FindMember extends Controller
{
    public function findMember(Request $request){
          $FindMember = $request->validate([
          'member_id' => 'required|string',
        ]);
        $GetMember = OfficialMember::where('member_id', $FindMember['member_id'])->first();
    if($GetMember){
        $Member = $GetMember['member_id'];
        session(['Member'=> $Member]);
        return redirect()->route('Shared.Capital.Form');
        }
    return redirect()->back()->with('error', 'Error!, Member ID is invalid.');
    }
}
