<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAll();

        return $this->responseSuccess(null, $products);
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $productParam = [
            'name' => $data['name'],
            'price' => $data['price']
        ];
        $product = $this->productRepository->add($productParam);

        return $this->responseSuccess(null, $product);
    }

    public function edit(Request $request, $id)
    {
        $data = $request->all();
        $productParam = [];

        if (array_key_exists('name', $data)) {
            $productParam['name'] = $data['name'];
        }

        if (array_key_exists('price', $data)) {
            $productParam['price'] = $data['price'];
        }

        $product = $this->productRepository->update($productParam, $id);

        return $this->responseSuccess(null, $product);
    }

    public function delete($id)
    {
        $deleteFlag = $this->productRepository->delete($id);

        return $this->responseSuccess(null, $deleteFlag);
    }
}
