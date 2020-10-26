<?php

namespace Tests\DB;

use \Cursos\DB\Condition;


final class ConditionTest extends \PHPUnit\Framework\TestCase {

    public function testCreateCondition() {
        $condition = new Condition("campo1", '=', 'valor1');

        $this->assertTrue($condition instanceof Condition);
    }

    public function testCreateWithValues() {
        for($i=0; $i<10; $i++) {
            $condition = new Condition("campo".$i, '='.$i, 'valor'.$i);
            $this->assertEquals("campo".$i, $condition->getField());
            $this->assertEquals("=".$i, $condition->getOperation());
            $this->assertEquals("valor".$i, $condition->getValue());
        }
    }
}