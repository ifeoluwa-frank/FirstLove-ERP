<?php

namespace App\Http\Controllers\Bacenta;

use App\Models\Member;
use App\Models\Ministry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    //

    function index() {
        $pageTitle = "Members";

        $bacenta = auth()->guard('bacenta')->user();

        $members = Member::where('bacenta_id', $bacenta->id)->paginate(20);

        return view('bacenta.member.member', compact('pageTitle', 'members'));
    }

    function create() {
        $bacenta = auth()->guard('bacenta')->user();
        $ministries = Ministry::where('status', true)->get();
        return view('bacenta.member.create', compact('bacenta', 'ministries'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate image if provided
            'dob' => 'nullable|date|before:today',
            'school' => 'nullable|string|max:255',
            'phone' => 'required|string|unique:members,phone|regex:/^([0-9\s\-\+\(\)]*)$/', // Phone format validation
            'whatsapp' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/', // Optional, validate format
            'address' => 'nullable|string|max:1000',
            'bacenta_id' => 'required|exists:bacentas,id',
            'joined_at' => 'nullable|date|before_or_equal:today',
            'last_visited_at' => 'nullable|date|before_or_equal:today',
            'ministry' => 'nullable|string|max:255',
            'speaks_in_tongues' => 'nullable|boolean',
            'baptized' => 'nullable|boolean',
            'nbs_certified' => 'nullable|boolean',
        ]);
    
        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
    
        // Ensure boolean fields are properly cast
        $validatedData['speaks_in_tongues'] = $request->boolean('speaks_in_tongues');
        $validatedData['baptized'] = $request->boolean('baptized');
        $validatedData['nbs_certified'] = $request->boolean('nbs_certified');
    
        Member::create($validatedData);
    
        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function detail($id)
    {
        $member = Member::with('bacenta')->findOrFail($id);
        $bacenta = auth()->guard('bacenta')->user();
        $ministries = Ministry::get();
        return view('bacenta.member.details', compact('member', 'bacenta', 'ministries'));
    }

        public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate image if provided
            'dob' => 'nullable|date|before:today',
            'school' => 'nullable|string|max:255',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/', // Phone format validation
            'whatsapp' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/', // Optional, validate format
            'address' => 'nullable|string|max:1000',
            'bacenta_id' => 'required|exists:bacentas,id',
            'joined_at' => 'nullable|date|before_or_equal:today',
            'last_visited_at' => 'nullable|date|before_or_equal:today',
            'ministry' => 'nullable|string|max:255',
            'speaks_in_tongues' => 'nullable|boolean',
            'baptized' => 'nullable|boolean',
            'nbs_certified' => 'nullable|boolean',
        ]);
    
        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
    
        // Ensure boolean fields are properly cast
        $validatedData['speaks_in_tongues'] = $request->boolean('speaks_in_tongues');
        $validatedData['baptized'] = $request->boolean('baptized');
        $validatedData['nbs_certified'] = $request->boolean('nbs_certified');
        // dd($request);

        $member->update($validatedData);
        if (!$member->update($validatedData)) {
            return back()->with('error', 'No changes detected or update failed.');
        }
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }
}
