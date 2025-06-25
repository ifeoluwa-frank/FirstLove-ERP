<?php

namespace App\Http\Controllers\Bacenta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    //

    function index() {
        $pageTitle = "Members";
        return view('bacenta.member.member', compact('pageTitle'));
    }
}
