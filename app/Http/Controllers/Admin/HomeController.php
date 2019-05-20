<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Jumlah Ahli Berdaftar',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\UserProfile',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
        ];

        $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
            if (isset($settings1['filter_days'])) {
                return $query->where(
                    $settings1['filter_field'],
                    '>=',
                    now()->subDays($settings1['filter_days'])->format('Y-m-d')
                );
            } else if (isset($settings1['filter_period'])) {
                switch ($settings1['filter_period']) {
                    case 'week':
                        $start  = date('Y-m-d', strtotime('last Monday'));
                        break;
                    case 'month':
                        $start = date('Y-m') . '-01';
                        break;
                    case 'year':
                        $start  = date('Y') . '-01-01';
                        break;
                }

                if (isset($start)) {
                    return $query->where($settings1['filter_field'], '>=', $start);
                }
            }
        })
            ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');

        $settings2 = [
            'chart_title'           => 'Senarai Ahli Terbaru',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\UserProfile',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                '0' => 'user',
                '1' => 'phone_number',
                '2' => 'cawangan',
            ],
        ];

        $settings2['data'] = $settings2['model']::latest()
            ->take($settings2['entries_number'])
            ->get();

        $settings3 = [
            'chart_title'           => 'Senarai Aktiviti Terbaru',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Aktiviti',
            'group_by_field'        => 'tarikh_mula',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '20',
            'fields'                => [
                '0' => 'bahagian',
                '1' => 'nama',
                '2' => 'jemputan_oleh',
                '3' => 'tarikh_mula',
            ],
        ];

        $settings3['data'] = $settings3['model']::latest()
            ->take($settings3['entries_number'])
            ->get();

        return view('home', compact('settings1', 'settings2', 'settings3'));
    }
}
