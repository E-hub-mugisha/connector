<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use App\Models\Order;
use App\Models\ServiceProvider;
use Livewire\Component;
use App\Exports\ServiceExport;
use App\Models\ServiceBooking;
use App\Models\User;
use Excel;
use Illuminate\Support\Facades\DB;

class AdminDashboardComponent extends Component
{
    public function exportExcel()
    {
        return Excel::download(new ServiceExport, 'services.xls');
    }
    public function render()
    {
        $porders = Order::orderBy('created_at', 'DESC')->get()->take(5);
        $orders = ServiceBooking::orderBy('created_at', 'DESC')->get()->take(5);
        $totalSales = Order::where('status', 'delivered')->count();
        $totalRevenue = ServiceBooking::all()->sum('total');
        $totalBooking = ServiceBooking::all()->sum('total');
        $totalSprovider = ServiceProvider::all()->count();
        $bookings = ServiceBooking::select(DB::raw("DATE_FORMAT(created_at, '%Y-%U') as week"), DB::raw('COUNT(*) as total'))
            ->groupBy('week')
            ->get();
        $data = collect($bookings)->map(function ($booking) {
            return [
                'week' => $booking->week,
                'count' => $booking->total
            ];
        })->toArray();

        $services = ServiceBooking::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();
        $done = collect($services)->map(function ($service) {
            return [
                'status' => $service->status,
                'count' => $service->count
            ];
        })->toArray();

        $providers = ServiceProvider::with('category')
            ->select('service_category_id', DB::raw('COUNT(*) as count'))
            ->groupBy('service_category_id')
            ->get();



        $userData = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $bookingData = ServiceBooking::select('payment_mode', DB::raw('COUNT(*) as count'))
                ->groupBy('payment_mode')
                ->get();

        return view('livewire.admin.admin-dashboard-component', [
            'orders' => $orders,
            'data' => $data,
            'userData' => $userData,
            'bookingData' => $bookingData,
            'done' => $done,
            'porders' => $porders,
            'totalSales' => $totalSales,
            'totalRevenue' => $totalRevenue,
            'totalBooking' => $totalBooking,
            'totalSprovider' => $totalSprovider,
            'bookings' => $bookings,
            'services' => $services,
            'providers' => $providers,
        ])->layout('layouts.app');
    }
}
