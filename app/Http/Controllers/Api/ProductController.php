<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ValidationAddProductRequest;
use App\Http\Requests\ValidationUpdateProductRequest;
use App\Repositories\Product\ProductRepository;

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

    public function add(ValidationAddProductRequest $request)
    {
        $data = $request->all();
        $productParam = [
            'name' => $data['name'],
            'price' => $data['price']
        ];
        $product = $this->productRepository->add($productParam);

        return $this->responseSuccess(null, $product);
    }

    public function edit(ValidationUpdateProductRequest $request, $id)
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

        if (!$product) {
            return $this->responseError();
        }

        return $this->responseSuccess(null, $product);
    }

    public function delete($id)
    {
        $deleteFlag = $this->productRepository->delete($id);

        return $this->responseSuccess(null, $deleteFlag);
    }
}
