<?php

namespace App\Ws;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class TotalCalculator
 * @package App
 */
class TotalCalculator
{

    const UNCOMPLETED_TOTALS_TABLE = 'uncompleted_per_minute';
    const TODOS_TABLE              = 'todos';

    /**
     * @return void
     */
    public function execute()
    {
        $total = $this->getNonCompletedTodosTotal();

        $result = false;

        if($id = $this->checkIfRecordExists()){
            $result = $this->updateTotal($id, $total);
        } else {
            $result = $this->insertTotal($total);
        }

        return $result;
    }

    /**
     * @return int $total
     */
    private function getNonCompletedTodosTotal()
    {
        $result = DB::table(self::TODOS_TABLE)
                  ->where('completed', 0)
                  ->selectRaw('count(id) as total')
                  ->first();

        return $result->total;
    }

    /**
     * @return bool
     */
    private function checkIfRecordExists()
    {
        $now = Carbon::now();

        $result = DB::table(self::UNCOMPLETED_TOTALS_TABLE)
            ->select('id')
            ->where('date', $now->format('Y-m-d'))
            ->whereBetween('time', [
                $now->format('H:i\\:00'),
                $now->format('H:i\\:59')])
            ->first();

        return ($result) ? $result->id : false;
    }

    /**
     * @param int $id
     * @param int $total
     *
     * @return bool
     */
    private function updateTotal(int $id, int $total) : bool
    {
        return DB::table(self::UNCOMPLETED_TOTALS_TABLE)->where('id', $id)->update([
            'total' => $total
        ]);
    }

    /**
     * @param int $total
     *
     * @return bool
     */
    private function insertTotal(int $total) : bool
    {
        $now = Carbon::now();

        return DB::table(self::UNCOMPLETED_TOTALS_TABLE)->insert([
            'date' => $now->format('Y-m-d'),
            'time' => $now->format('H:i:s'),
            'total' => $total
        ]);
    }
}