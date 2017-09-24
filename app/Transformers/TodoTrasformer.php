<?php

namespace App\Transformers;

use App\Todo;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

/**
 * Class TodoTransformer
 * @package App\Transformers
 */
class TodoTransformer extends TransformerAbstract
{
    public function transform(Todo $todo)
    {
        return [
            'id'        => (int) $todo->id,
            'name'      => (string) $todo->name,
            'completed' => (bool) $todo->completed,
            'updated'   => $todo->updated_at->toDateTimeString(),
        ];
    }
}