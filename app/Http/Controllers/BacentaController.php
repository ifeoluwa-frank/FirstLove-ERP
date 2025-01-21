<?php

namespace App\Http\Controllers;

use App\Models\Bacenta;
use Illuminate\Http\Request;

class BacentaController extends Controller
{
    public function index(){
        $bacentas = Bacenta::get();
        return view('bacenta.bacenta_list', compact('bacentas'));
    }

    public function show(){
        return view('bacenta.add_bacenta');
    }

    public function add(Request $request){
        $bacenta = new Bacenta();

        $bacenta->bacenta_name = $request->bacenta_name;
        $bacenta->bacenta_leader_id = $request->bacenta_leader_id;
        $bacenta->location = $request->location;
        $bacenta->username = $request->username;
        $bacenta->password = $request->password;

        $bacenta->save();

        return to_route('bacenta.index');
    }
}
