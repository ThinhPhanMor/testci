<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Exception;

abstract class BaseCollection extends ResourceCollection
{
    /**
     * @var null
     */
    private $rawResource = null;

    /**
     * @var bool
     */
    private $onlyList = false;

    /**
     * @var null
     */
    private $default = null;

    /**
     * BaseCollection constructor.
     *
     * @param $resource
     * @param bool $onlyList
     * @param null $default
     */
    public function __construct($resource, $onlyList = false, $default = null)
    {
        if (!empty($resource)) {
            parent::__construct($resource);
        }

        $this->rawResource = $resource;
        $this->onlyList = $onlyList;
        $this->default = $default;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return mixed
     */
    public function toArray($request)
    {
        if (empty($this->collection) && empty($this->rawResource)) {
            return $this->default;
        }

        if ($this->collection instanceof Collection) {
            return $this->isCollection();
        } elseif ($this->collection instanceof Builder) {
            return $this->isSingle();
        }

        return null;
    }

    /**
     * If this is builder
     */
    public function isSingle()
    {
        return $this->fields($this->rawResource, request());
    }

    /**
     * If this is a collection
     *
     * @return array
     */
    public function isCollection()
    {
        if ($this->onlyList) {
            return $this->collectResource($this->collection)->transform(function ($item) {
                return $this->fields($item, request());
            });
        }

        return [
            'list' => $this->collectResource($this->collection)->transform(function ($item) {
                return $this->fields($item, request());
            }),
            'paginate' => $this->pagination()
        ];
    }

    /**
     * Get pagination
     *
     * @return array|null
     */
    public function pagination()
    {
        try {
            return [
                'current_page' => $this->currentPage(),
                'from' => $this->firstItem(),
                'last_page' => $this->lastPage(),
                'count' => $this->count(),
                'to' => $this->lastItem(),
                'per_page' => (int)$this->perPage(),
                'total' => $this->total()
            ];
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Return array contains fields of table
     *
     * @param Model $model
     * @param mixed $request
     * @return array
     */
    abstract protected function fields(Model $model, $request);
}
