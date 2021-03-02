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

        foreach ($column_names as $column_name) {
            
        }


        $query["columns"] = $this->filterColumns($inputs);


        return $column_names;
    }

    public function filterColumns(array $inputs = [])
    {
        $results = [];

        if (array_key_exists("columns", $inputs) and !empty($inputs)) {
            $attributes = (is_array($inputs["columns"])) ? $inputs["columns"] : array_map("trim", explode(",", $inputs["columns"]));
            foreach ($attributes as  $attribute) {
                array_push($results, $attribute);
            }
        }

        return $results;
    }

    public function addEqualFilterToQuery()
    {

    }
}
