<?php

namespace App\Repositories\Test;

use App\Repositories\BaseRepository;
use App\Test;

class TestRepository extends BaseRepository
{
    public $test;

    public function __construct(Test $test)
    {
        parent::__construct($test);
    }
}
