<?php

namespace App\Http\Controllers\Bacenta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BacentaAttendanceController extends Controller
{
    //

    function index(){
        $pageTitle = "Membership Attendance";

        return view('bacenta.attendance.index', compact('pageTitle'));
    }
}
