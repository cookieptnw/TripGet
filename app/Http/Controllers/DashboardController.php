<?php

namespace App\Http\Controllers;

use App\User;
use App\Hotel;
use App\Voucher;
use App\MyVoucher;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $newUserCount = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $newUserCountPast = User::whereBetween('created_at', [Carbon::now()->subWeeks(1)->startOfWeek(), Carbon::now()->subWeeks(1)->endOfWeek()])->count();
        $totalHotel = Hotel::whereMonth('created_at', Carbon::now())->count();
        $totalHotelPast = Hotel::whereMonth('created_at', Carbon::now()->subMonths(1))->count();
        $Voucher = Voucher::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $VoucherPast = Voucher::whereBetween('created_at', [Carbon::now()->subWeeks(1)->startOfWeek(), Carbon::now()->subWeeks(1)->endOfWeek()])->count();
        $MyVoucher = MyVoucher::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $MyVoucherPast = MyVoucher::whereBetween('created_at', [Carbon::now()->subWeeks(1)->startOfWeek(), Carbon::now()->subWeeks(1)->endOfWeek()])->count();

        return [
            "result" => [
                "newUserCount" => number_format($newUserCount),
                "newUserCountPast" => number_format($newUserCountPast),
                "totalHotel" =>  number_format($totalHotel),
                "totalHotelPast" => number_format($totalHotelPast),
                "Voucher" => number_format($Voucher),
                "VoucherPast" => number_format($VoucherPast),
                "MyVoucher" => number_format($MyVoucher),
                "MyVoucherPast" => number_format($MyVoucherPast)

            ]
        ];
    }
}