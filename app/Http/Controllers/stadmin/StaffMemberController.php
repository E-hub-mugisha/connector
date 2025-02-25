<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffMemberController extends Controller
{
    public function index()
    {
        $serviceProviderId = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $staffMembers = StaffMember::where('service_provider_id', $serviceProviderId->id)->with('services')->get();
        $services = Service::where('service_provider_id', $serviceProviderId->id)->get();
        return view('stadmin.staff.index', compact('staffMembers', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff_members,email',
            'role' => 'required|string|max:255',
        ]);

        // Get the authenticated user's service_provider_id
        $serviceProviderId = ServiceProvider::where('user_id', Auth::user()->id)->first();

        // Create staff member
        StaffMember::create([
            'service_provider_id' => $serviceProviderId->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('staff-members.index')->with('success', 'Staff member added successfully.');
    }

    public function show($id)
    {
        $staffMember = StaffMember::with('serviceProvider', 'services')->findOrFail($id);
        return response()->json($staffMember);
    }

    public function update(Request $request, $id)
    {
        $staffMember = StaffMember::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:staff_members,email,' . $id,
            'role' => 'sometimes|required|string|max:255',
            'services' => 'array',
            'services.*' => 'exists:services,id'
        ]);

        $staffMember->update($request->only(['name', 'email', 'role']));

        if ($request->has('services')) {
            $staffMember->services()->sync($request->services);
        }

        return redirect()->route('staff-members.index')->with('success', 'Staff member updated successfully.');
    }

    public function updateServices(Request $request)
    {
        $request->validate([
            'staff_id' => 'required|exists:staff_members,id',
            'services' => 'array',
            'services.*' => 'exists:services,id',
        ]);
    
        // Find the staff member
        $staffMember = StaffMember::findOrFail($request->staff_id);
    
        // Add the new services to the staff member without removing existing ones
        $staffMember->services()->attach($request->services);

        return redirect()->route('staff-members.index')->with('success', 'Services updated successfully.');
    }

    public function destroy($id)
    {
        $staffMember = StaffMember::findOrFail($id);
        $staffMember->services()->detach();
        $staffMember->delete();

        return redirect()->route('staff-members.index')->with('success', 'Staff member deleted successfully.');
    }
}
