<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Bacenta;
use App\Models\Ministry;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::with('bacenta')->with('fellowship')->paginate(20);
        $pageTitle = "Members";
        return view('admin.member.member', compact('members', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bacentas = Bacenta::where('is_active', 1)->get();
        $ministries = Ministry::where('status', true)->get();
        return view('admin.member.create', compact('bacentas', 'ministries'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
    
        return redirect()->route('member.index')->with('success', 'Member created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::with('bacenta')->findOrFail($id);
        $bacentas = Bacenta::get();
        $ministries = Ministry::get();
        return view('admin.member.details', compact('member', 'bacentas', 'ministries'));
    }

    /**
     * Update the specified resource in storage.
     */
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
        return redirect()->route('member.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
