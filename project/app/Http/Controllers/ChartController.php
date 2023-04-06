<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ChartController extends Controller
{
    public function show_chart(){
        $label = Order::select('order_total','created_at')->orderBy('created_at','ASC')->get()->groupBy(function($data){
            Carbon::parse($data->created_at)->format('F Y');
            return Carbon::parse($data->created_at)->format('F Y');
            // format('l jS \\of F Y h:i:s A');  Thursday 18th of October 2018 09:18:57 PM
        });
        $label1 = Order::select('order_total as total','created_at as time')->get();
        $elections = $label1->mapWithKeys(function ($item, $key){
            return [$item->time =>$item->total];
        });
        
        return view('admin.charts.chart',[
            'label' => $label,
            'elections' => $elections,
        ]);
    }
}
