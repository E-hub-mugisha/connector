<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkingHourController extends Controller
{
    public function index()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $workingHours = WorkingHour::where('sprovider_id', $sprovider->id)->get();
        return view('stadmin.working_hours.index', compact('workingHours', 'sprovider'));
    }

    public function create()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.working_hours.create', compact('sprovider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|string|max:10',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'is_closed' => 'boolean',
        ]);
    
        WorkingHour::create([
            'sprovider_id' => $request->sprovider_id,
            'day' => $request->day,
            'start_time' => $request->is_closed ? null : $request->start_time,
            'end_time' => $request->is_closed ? null : $request->end_time,
            'is_closed' => $request->is_closed,
        ]);

        alert()->success('Thank You', 'Working hours added successfully');
        return redirect()->route('working_hours.index', $request->sprovider_id)
            ->with('success', 'Working hours added successfully.');
    }

    public function edit($id)
    {
        $workingHour = WorkingHour::findOrFail($id);
        return view('stadmin.working_hours.edit', compact('workingHour'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string|max:10',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'is_closed' => 'boolean',
        ]);
    
        $workingHour = WorkingHour::findOrFail($id);
        $workingHour->update([
            'day' => $request->day,
            'start_time' => $request->is_closed ? null : $request->start_time,
            'end_time' => $request->is_closed ? null : $request->end_time,
            'is_closed' => $request->is_closed,
        ]);

        alert()->success('Thank You', 'Working hours updated successfully.');
        return redirect()->route('working_hours.index', $workingHour->sprovider_id)
            ->with('success', 'Working hours updated successfully.');
    }

    public function destroy($id)
    {
        $workingHour = WorkingHour::findOrFail($id);
        $workingHour->delete();

        alert()->success('Thank You', 'Your Working hours deleted successfully');
        return redirect()->route('working_hours.index', $workingHour->sprovider_id)
            ->with('success', 'Working hours deleted successfully.');
    }
}

