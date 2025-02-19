<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceMedia;
use App\Models\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceMediaController extends Controller
{
    public function index()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $services = Service::where('service_provider_id', $sprovider->id)->get();
        $medias = ServiceMedia::all();
        return view('stadmin.media.index', compact('services','medias'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'files.*' => 'required|mimes:jpg,png,jpeg,mp4,mov,avi|max:10240',
        ]);
    
        foreach ($request->file('files') as $file) {
            // Generate filename using datetime format
            $filename = Carbon::now()->format('YmdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
            // Define the destination path (inside public folder)
            $destinationPath = public_path('image/services/');
    
            // Move the file to the public directory
            $file->move($destinationPath, $filename);
    
            // Determine file type
            $type = in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi']) ? 'video' : 'image';
    
            // Save only the filename (not full path) in the database
            ServiceMedia::create([
                'service_id' => $request->service_id,
                'file_path' => $filename, // Only filename stored
                'type' => $type
            ]);
        }
    
        return response()->json(['message' => 'Files uploaded successfully']);
        
    }

    public function destroy($id)
    {
        $media = ServiceMedia::findOrFail($id);
        unlink(storage_path('app/public/' . $media->file_path));
        $media->delete();

        return back()->with('success', 'Media deleted successfully.');
    }
}

