<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::paginate(20);
        $pageTitle = "Services";
        // dd($services);
        return view('admin.service.index', compact('services', 'pageTitle'));
    }

    public function addEdit (Request $request) {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        if ($request->has('id')) {
            // Ignore the current ID when checking uniqueness
            $rules['name'] .= '|unique:services,name,' . $request->id;
        } else {
            $rules['name'] .= '|unique:services,name';
        }

        $validatedData = $request->validate($rules);

        if($request->has('id')) {
            $service = Service::findOrFail($request->id);
            $service->name = $request->name;
            $service->is_special = $request->is_special;
            $service->save();
        } else {
            Service::create($validatedData);
        }

        return to_route('service.index');
    }
}
