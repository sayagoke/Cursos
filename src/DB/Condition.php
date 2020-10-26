<?php

namespace Cursos\DB;

final class Condition {

    /**
     * @var string
     */
    private $field;
    /**
     * @var string
     */
    private $operation;
    /**
     * @var string
     */
    private $value;

    public function __construct(string $field, string $operation, string $value) {
        $this->field = $field;
        $this->operation = $operation;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getField() {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getOperation() {
        return $this->operation;
    }
    
    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }
}