<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DemoCollection extends BaseCollection
{
    protected function fields(Model $model, $request)
    {
        return [
            'id' => $model->id,
            'description' => $this->description,
            'created_by' => $this->description,
            'updated_by' => $this->description,
            'created_at' => Carbon::parse($model->created_at)
                ->format(RESPONSE_DATETIME_FORMAT),
        ];
    }
}
