<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use App\Models\Order;
use App\Models\ServiceProvider;
use Livewire\Component;
use App\Exports\ServiceExport;
use Excel;

class AdminDashboardComponent extends Component
{
    public function exportExcel()
    {
        return Excel::download(new ServiceExport,'services.xls');
    }
    public function render()
    {
        $porders = Order::orderBy('created_at', 'DESC')->get()->take(5);
        $orders = Booking::orderBy('created_at', 'DESC')->get()->take(5);
        $totalSales = Order::where('status','delivered')->count();
        $totalRevenue = Order::all()->sum('total');
        $totalBooking = Booking::all()->sum('total');
        $totalSprovider = ServiceProvider::all()->count();
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>$orders,
            'porders'=>$porders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'totalBooking'=>$totalBooking,
            'totalSprovider'=>$totalSprovider
        ])->layout('layouts.app');
    }
}
