<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Bacenta;
use App\Models\Ministry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $pageTitle = "Dashboard";
        $members_count = Member::count();
        $bacenta_count = Bacenta::count();
        $sonta_count = Ministry::count();
        $upcoming_birthdays = Member::select('first_name', 'last_name', 'bacenta_id', 'dob')
        ->whereRaw("DATE_FORMAT(dob, '%m-%d') >= DATE_FORMAT(NOW(), '%m-%d')")
        ->orderByRaw("DATE_FORMAT(dob, '%m-%d') ASC")
        ->limit(3)
        ->get();
        return view('dashboard2', compact('members_count', 'pageTitle', 'bacenta_count', 'sonta_count', 'upcoming_birthdays'));
    }
}
