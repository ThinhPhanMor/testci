<?php

namespace App\Http\Controllers\Api;

class DemoController extends BaseController
{
    public function getDemo()
    {
        $data = [1,2,3,4,5,6];
        return $this->responseSuccess(null, $data);
    }
}
