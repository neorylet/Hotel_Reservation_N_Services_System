<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the hotel services.
     */
    public function displayHotelServices()
    {
        // Fetch all services from the database
        $services = Service::all();

        return view('hotel.hotelservices', compact('services'));
    }

    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created service in storage.
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
     * Display the specified service.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
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
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // Delete service front image if it exists
        if ($service->service_front_image && Storage::disk('public')->exists($service->service_front_image)) {
            Storage::disk('public')->delete($service->service_front_image);
        }
        
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }

    /**
     * Display the hotel menu with different categories.
     */
    public function displayHotelMenu()
    {
        // Get services by their sub-type
        $mains = Service::where('service_sub_type', 'main')->get();
        $desserts = Service::where('service_sub_type', 'dessert')->get();
        $drinks = Service::where('service_sub_type', 'drink')->get();
        
        // Pass these variables to the view
        return view('hotel.hotelservices', compact('mains', 'desserts', 'drinks'));
    }

    public function displayHotelMenuOnHome()
{
    $mains = Service::where('service_sub_type', 'main')->get();
    $desserts = Service::where('service_sub_type', 'dessert')->get();
    $drinks = Service::where('service_sub_type', 'drink')->get();

    
    return view('hotel.hotelhome', compact('mains', 'desserts', 'drinks'));
}


    
}
