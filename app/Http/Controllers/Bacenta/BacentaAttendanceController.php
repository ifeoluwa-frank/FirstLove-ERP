<?php

namespace App\Http\Controllers\Bacenta;

use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MembershipAttendance;

class BacentaAttendanceController extends Controller
{
    //

    function index(){
        $pageTitle = "Membership Attendance";
        $services = Service::get();
        $bacenta = auth()->guard('bacenta')->user();
        $myMembers = Member::where('bacenta_id', $bacenta->id)->get();

        return view('bacenta.attendance.index', compact('pageTitle', 'myMembers', 'services', 'bacenta'));
    }

    function membershipAttendance(Request $request) {
        // dd($request);
        $request->validate([
            'service_id'    => 'required|integer|exists:services,id',
            'service_date'  => 'required|date',
            'bacenta_id'    => 'required|integer|exists:bacentas,id',
            'user_ids'      => 'nullable|array',
            'user_ids.*'    => 'integer|exists:members,id', // validate each user ID
            'member_count'  => 'required|integer|min:0',
        ]);

        $exist = MembershipAttendance::where('service_date', $request->service_date)
            ->where('service_id', $request->service_id)
            ->where('bacenta_id', $request->bacenta_id)
            ->exists();

        if($exist){
            return back()->with([
                'notify' => 'This bacenta already submitted for same service!',
                'notify_type' => 'error', // or 'success', 'error'
            ]);
        }

        MembershipAttendance::create([
            'service_id'    => $request->service_id,
            'service_date'  => $request->service_date,
            'bacenta_id'    => $request->bacenta_id,
            'member_count'  => $request->member_count,
            'user_ids'      => json_encode($request->user_ids ?? []), 
        ]);
        return back()->with([
            'notify' => 'Attendance Submitted Successfully',
            'notify_type' => 'success', // or 'success', 'error'
        ]);

    }
}
