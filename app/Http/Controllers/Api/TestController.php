<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Test\TestRepository;
use Illuminate\Http\Request;

class TestController extends BaseController
{
    /**
     * @var TestRepository
     */
    private $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function index()
    {
        $tests = $this->testRepository->getAll();
        return $this->responseSuccess(null, $tests);
    }
}
