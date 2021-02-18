<?php

namespace App\ChaldeaTools\SenkoSan;

use App\ChaldeaTools\SenkoSan\DataBases;

abstract class Kitsune extends DataBases
{

    abstract public function getColumns(): array;

    public function __construct(private string $table_name = "")
    {
    }

    public function buildQueryWithDefaultFilters($inputs = [])
    {

        $query = [
            "conditions" => [],
            "values" => [],
            "sorts" => [],
            "columns" => [],
            "limit" => null,
            "offset" => null,
        ];

        $column_names = $this->getColumns();

        if (is_array($column_names)) {
            foreach ($column_names as $column_name) {
                
            }
        }

        return $column_names;
    }
}
