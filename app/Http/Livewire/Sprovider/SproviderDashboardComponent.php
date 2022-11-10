<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\Order;
use Livewire\Component;
use App\Models\ServiceBooking;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class SproviderDashboardComponent extends Component
{
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $services = Service::where('service_provider_id',$sprovider->id)->get();
        $orders = ServiceBooking::where('service_provider_id',$sprovider->id)->orderBy('created_at', 'DESC')->get()->take(5);
        $totalSales = ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','completed')->count();
        $totalRevenue = ServiceBooking::where('service_provider_id',$sprovider->id)->sum('total');
        $totalPending = ServiceBooking::where('service_provider_id',$sprovider->id)->where('status','pending')->count();
        return view('livewire.sprovider.sprovider-dashboard-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'totalPending'=>$totalPending,
            'services'=>$services,
        ])->layout('layouts.guest');
    }
}
