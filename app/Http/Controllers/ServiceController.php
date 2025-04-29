<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'service_sub_type' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'service_description' => 'nullable|string',
            'service_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('service_front_image')) {
            $validated['service_front_image'] = $request->file('service_front_image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'service_sub_type' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'service_description' => 'nullable|string',
            'service_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('service_front_image')) {
            // Delete old image if exists
            if ($service->service_front_image && Storage::disk('public')->exists($service->service_front_image)) {
                Storage::disk('public')->delete($service->service_front_image);
            }
            $validated['service_front_image'] = $request->file('service_front_image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->service_front_image && Storage::disk('public')->exists($service->service_front_image)) {
            Storage::disk('public')->delete($service->service_front_image);
        }
        
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
