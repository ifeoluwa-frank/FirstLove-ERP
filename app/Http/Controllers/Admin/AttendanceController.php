<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\UsherHeadcount;
use App\Models\BusingAttendance;
use App\Http\Controllers\Controller;
use App\Models\MembershipAttendance;

class AttendanceController extends Controller
{
    public function index() {
        $pageTitle = "Attendance";
        $sundayService = Service::where('sunday_service', 1)->where('is_special', 0)->first();
        $ushersHeadcount = UsherHeadcount::with('service')->where('service_id', $sundayService->id)->latest('service_date')->first();
        $services = Service::get();
        // dd($sundayService);
    
        return view('admin.attendance.index', compact('pageTitle', 'ushersHeadcount', 'services', 'sundayService'));
    }

    public function saveHeadcount(Request $request) {
        $attendance = new UsherHeadcount();

        $attendance->service_id = $request->service_id;
        $attendance->service_date = $request->service_date;
        $attendance->headcount = $request->headcount;

        $attendance->save();

        return to_route('attendance.index');
    }

    public function saveBusingAttendance(Request $request) {
        $attendance = new BusingAttendance();

        $attendance->service_id = $request->service_id;
        $attendance->service_date = $request->service_date;
        $attendance->bacenta_id = $request->bacenta_id;
        $attendance->bus_count = $request->bus_count;

        $attendance->save();
    }

    public function attendance(Request $request) {
        $attendance = new Attendance();

        $attendance->service_id = $request->service_id;
        $attendance->service_date = $request->service_date;
        $attendance->bacenta_id = $request->bacenta_id;
        $attendance->member_ids = $request->member_ids;

        $attendance->save();

        $count = 0;
        foreach($request->member_ids as $member) {
            $count += 1;
        }

        $mebership_attendance = new MembershipAttendance();

        $mebership_attendance->service_id = $request->service_id;
        $mebership_attendance->service_date = $request->service_date;
        $mebership_attendance->bacenta_id = $request->bacenta_id;
        $mebership_attendance->count = $count;

        $mebership_attendance->save();
    }
}
