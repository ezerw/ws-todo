<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class ChartController
 *
 * @package App\Http\Controllers
 */
class ChartController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $rawCollection = DB::table('uncompleted_per_minute')->get();

        $formattedData = $rawCollection->mapWithKeys( function($item) {
            return [
                Carbon::createFromFormat('H:i:s', $item->time)->format('H:i') => $item->total
            ];
        });

        return response()->json([
            'data' => $formattedData
        ], 200);

    }

}