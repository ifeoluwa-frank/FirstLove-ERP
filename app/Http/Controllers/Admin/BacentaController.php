<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Bacenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BacentaController extends Controller
{
    public function index(){
        $bacentas = Bacenta::with('leader')->withCount('members')->orderByDesc('members_count')->paginate(20);
        $pageTitle = "Bacentas";
        $leaders = Member::get();
        return view('admin.bacenta.bacenta_list', compact('bacentas', 'leaders', 'pageTitle'));
    }

    public function eachBacentaMember(Request $request, $id){
        $members = Member::where('bacenta_id', $id)->with('fellowship')->with('bacenta')->paginate(20);
        $bacentaName = Bacenta::findOrFail($id);
        return view('admin.bacenta.member', compact('members', 'bacentaName'));
    }

    public function addEdit(Request $request){
        if($request->has('id')) {
            $id = $request->id;
            $bacenta = Bacenta::where('id', $id)->first();

            $bacenta->bacenta_name = $request->bacenta_name;
            $bacenta->bacenta_leader_id = $request->bacenta_leader_id;
            $bacenta->location = $request->location;
            $bacenta->is_active = $request->is_active;
            $bacenta->username = $request->username;
            $bacenta->password = Hash::make($request->password);
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
            $bacenta->password = Hash::make($request->password);
            $bacenta->save();
    
            return to_route('bacenta.index');
        }
    }
}
