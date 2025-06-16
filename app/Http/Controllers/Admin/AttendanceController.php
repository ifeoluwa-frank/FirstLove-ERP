<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\UsherHeadcount;
use App\Models\BusingAttendance;
use App\Http\Controllers\Controller;
use App\Models\MembershipAttendance;

class AttendanceController extends Controller
{
    public function index(Request $request) {
        $pageTitle = "Attendance";
        $error = "";

        // GET SUNDAY ATTENDANCE
        $sundayService = Service::where('sunday_service', 1)->where('is_special', 0)->first();
        if($request->has('service_date')){
            // Get Sunday Attendance Based On Date Filter

            $isSunday = Carbon::parse($request->service_date)->isSunday();
            if($isSunday){
                // Users Headcount Attendance
                $ushersHeadcount = UsherHeadcount::with('service')
                ->where('service_id', $sundayService->id)
                ->where('service_date', $request->service_date)
                ->first();
        
                // TODO:: Busing Attendance
                // TODO:: Membership Attendance
            } else {
                $error = "Date Not A Sunday";
                $ushersHeadcount = [];
                // TODO:: Assign empty array to other attendance types
            }
        } else {

            // Users Headcount Attendance
            $ushersHeadcount = UsherHeadcount::with('service')
            ->where('service_id', $sundayService->id)
            ->latest('service_date')
            ->first();
    
            // TODO:: Busing Attendance
            // TODO:: Membership Attendance
        }

        $services = Service::get();
        //GET MIDWEEK SERVICE ATTENDANCE
        $bacentaService = Service::where('bacenta_level', 1)->where('sunday_service', 0)->first();

        $startOfWeek = Carbon::now()->startOfWeek(); // Get Monday of the current week
        $endOfWeek = Carbon::now()->endOfWeek(); // Get Sunday of the current week

        $membershipAttendance = null;
        if($bacentaService){
            $membershipAttendance = MembershipAttendance::with('bacenta')
            ->whereBetween('service_date', [$startOfWeek, $endOfWeek])
            ->where('service_id', $bacentaService->id)
            ->get();
        }
        
    
        return view('admin.attendance.index', compact('pageTitle', 'ushersHeadcount', 'services', 'sundayService', 'bacentaService', 'membershipAttendance', 'error'));
    }

    public function record() {
        $pageTitle = "Record Attendance";

        $headcounts = UsherHeadcount::orderBy('created_at', 'asc')->limit(5)->get();
        // Services
        $services = Service::where('bacenta_level', 0)->get();

        return view('admin.attendance.record', compact('pageTitle', 'headcounts', 'services'));
    }

    public function saveHeadcount(Request $request) {
        $attendance = new UsherHeadcount();

        $attendance->service_id = $request->service_id;
        $attendance->service_date = $request->service_date;
        $attendance->headcount = $request->headcount;

        $attendance->save();

        return to_route('attendance.record');
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

    public function busing_home(){
        return view('admin.attendance.busing_attendance', compact());
}
