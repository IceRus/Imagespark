<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $query;
    protected $request;

    /**
     * Сохраняем входящие запросы
     *
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * По названию request определяем какой метод использовать
     *
     * @param $query
     * @return mixed
     */
    public function apply($query)
    {
        $this->query = $query;

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter) && !empty($value)) {
                $this->$filter($value);
            }
        }
        return $this->query;
    }

    /**
     * Собираем все request
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }
}
