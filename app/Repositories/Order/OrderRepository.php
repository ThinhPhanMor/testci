<?php

namespace App\Repositories\Order;

use App\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository
{
    public $order;

    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
}
