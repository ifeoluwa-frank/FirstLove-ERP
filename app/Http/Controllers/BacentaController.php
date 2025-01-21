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

    public function addEdit(Request $request){
        if($request->has('id')) {
            $bacenta = Bacenta::where('id', $id)->first();

            $bacenta->bacenta_name = $request->bacenta_name;
            $bacenta->bacenta_leader_id = $request->bacenta_leader_id;
            $bacenta->location = $request->location;
            $bacenta->is_active = $request->is_active;
            $bacenta->username = $request->username;
            $bacenta->password = $request->password;
            $bacenta->save();

            return to_route('bacenta.index');
        } else {
            $bacenta = new Bacenta();

            $bacenta->bacenta_name = $request->bacenta_name;
            $bacenta->bacenta_leader_id = $request->bacenta_leader_id;
            $bacenta->location = $request->location;
            $bacenta->is_active = $request->is_active;
            $bacenta->username = $request->username;
    
            // TODO: Hash password
            $bacenta->password = $request->password;
            $bacenta->save();
    
            return to_route('bacenta.index');
        }
    }
}
