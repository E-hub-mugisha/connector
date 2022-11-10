<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceBooked;
use App\Models\ServiceBooking;
use App\Models\ServiceTransaction;
use Illuminate\Support\Facades\Auth;

class BookingComponent extends Component
{
    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }
    
    public function render()
    {
        $service = Service::where('slug', $this->service_slug)->first();
        return view('livewire.booking-component', ['service' => $service])->layout('layouts.base');
    }
}
