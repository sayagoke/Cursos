<?php

namespace Cursos\DB;


interface StorageInterface {

    /**
     * @param string $schema
     * @param array $data
     * @return Bool
     */
    public function save($schema, array $data);

    /**
     * @param string $schema
     * @param Condition[] $conditions
     * @return array
     */
    public function findOne($schema, array $conditions);

    /**
     * @param $schema Condition[] $conditions
     * @return array
     */
    public function find($schema, array $conditions);

}