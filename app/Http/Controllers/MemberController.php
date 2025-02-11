<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('member.member', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
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

        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Member created successfully.');
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
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate image if provided
            'dob' => 'nullable|date|before:today',
            'school' => 'nullable|string|max:255',
            'phone' => 'required|string|unique:members,phone,' . $member->id . '|regex:/^([0-9\s\-\+\(\)]*)$/', // Phone format validation with exception for the current member
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

        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
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
