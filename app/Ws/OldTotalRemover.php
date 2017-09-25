<?php

namespace App\Ws;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class OldTotalRemover
 *
 * @package App
 */
class OldTotalRemover
{
    const UNCOMPLETED_TOTALS_TABLE = 'uncompleted_per_minute';

    /**
     * @return bool
     */
    public function execute()
    {
        $result = DB::table(self::UNCOMPLETED_TOTALS_TABLE)
                  ->where('date', Carbon::now()->format('Y-m-d'))
                  ->where('time', '<', Carbon::now()->subHour()->format('H:i\\:00'))
                  ->delete();

        return $result;
    }

}