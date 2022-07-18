<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $pie0 = new ChartsService([
            'title'              => 'price widget',
            'chart_type'         => 'pie',
            'model'              => 'App\Models\Price',
            'group_by_field'     => 'retail',
            'group_by_period'    => 'day',
            'column_class'       => 'col-md-12',
            'aggregate_function' => 'count',
            'aggregate_field'    => '',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 60,
        ]);

        return response()->json(compact('pie0'));
    }
}
