<?php

namespace App\Http\Controllers\Api;

class DemoController extends BaseController
{
    public function getDemo()
    {
        $data = [1,2,3,4,5,6]; if ($a= 1)
        return $this->responseSuccess(null, $data);
    }
}
