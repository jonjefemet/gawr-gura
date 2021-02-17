<?php

namespace App\ChaldeaTools\SenkoSan;

use App\ChaldeaTools\SenkoSan\DataBases;

class Kitsune extends DataBases
{

    public function __construct(private string $table_name = "")
    {
    }

    public function getAll(array $filter = [], string $db_name = "default")
    {

        try {

            $bind = [];

            $connection = $this->getConnection($db_name);
            $this->sentence = 'SELECT * FROM ' . $this->table_name ;
            $statement = $connection->prepare($this->sentence);
            $statement->execute($bind);

            $data = [];
            while ($row = $statement->fetch()) {
                $data[] = $row;
            }

            return $data;
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }

    }
}
