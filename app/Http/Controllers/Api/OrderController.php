<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Order\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAll();
        return $this->responseSuccess(null, $orders);
    }
}
