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

    public function addEdit(Request $request) {
        $rules = [
            'name' => 'required|string|max:255|unique:services,name' . ($request->id ? ',' . $request->id : ''),
            'is_special' => 'sometimes|boolean', 
            'bacenta_level' => 'sometimes|boolean',
            'sunday_service' => 'sometimes|boolean',
        ];
    
        $validatedData = $request->validate($rules);
    
        if ($request->has('id')) {
            // Update existing service
            $service = Service::findOrFail($request->id);
            $service->update([
                'name' => $validatedData['name'],
                'is_special' => $request->has('is_special') ? $request->is_special : false,
                'bacenta_level' => $request->has('bacenta_level') ? $request->bacenta_level : false,
                'sunday_service' => $request->has('sunday_service') ? $request->sunday_service : false,
            ]);
        } else {
            // Create a new service
            Service::create([
                'name' => $validatedData['name'],
                'is_special' => $request->has('is_special') ? $request->is_special : false,
                'bacenta_level' => $request->has('bacenta_level') ? $request->bacenta_level : false,
                'sunday_service' => $request->has('sunday_service') ? $request->sunday_service : false,
            ]);
        }
    
        return to_route('service.index');
    }
    
}
