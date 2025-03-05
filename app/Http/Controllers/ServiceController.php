<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::get();
    }

    public function addEdit (Request $request) {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        if ($request->has('id')) {
            // Ignore the current ID when checking uniqueness
            $rules['name'] .= '|unique:ministries,name,' . $request->id;
        } else {
            $rules['name'] .= '|unique:ministries,name';
        }

        $validatedData = $request->validate($rules);

        if($request->has('id')) {
            $service = Service::findOrFail($request->id);
            $service->name = $request->name;
            $service->save();
        } else {
            Service::create($validatedData);
        }
    }
}
