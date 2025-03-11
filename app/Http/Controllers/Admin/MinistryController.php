<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;

class MinistryController extends Controller
{
    //
    public function index() {
        $ministries = Ministry::paginate(20);
        return view('admin.ministry.index', compact('ministries'));
    }

    public function addEdit(Request $request) {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|boolean',
        ];

        if ($request->has('id')) {
            // Ignore the current ID when checking uniqueness
            $rules['name'] .= '|unique:ministries,name,' . $request->id;
        } else {
            $rules['name'] .= '|unique:ministries,name';
        }

        $validatedData = $request->validate($rules);

        if($request->has('id')) {
            $ministry = Ministry::findOrFail($request->id);
            $ministry->name = $request->name;
            $ministry->description = $request->description;
            $ministry->status = $request->status;
            $ministry->save();
        } else {
            Ministry::create($validatedData);
        }

        return redirect()->route('ministry.index')->with('success', 'Ministry saved successfully.');
    }
}
