<?php

namespace App\Repositories\Product;

use App\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public $product;

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }
}
