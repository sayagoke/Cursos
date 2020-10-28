<?php

namespace Tests\Services;

// - EmpleadoService
//     register(nombre, apellido...) : Empleado
//     update(Empleado) : Empleado
//     delete(Empleado) : Empleado
//     findOne(email*) : Empleado
//     findAll() : Empleado[]

final class EmpleadoServiceTest extends \PHPUnit\Framework\TestCase {

    public function testExists() {
        $this->assertTrue(class_exists("Cursos\Services\EmpleadoService"));
    }
    /**
     * @var \Cursos\DB\MemoryStorage
     */
    private $db;

    /**
     * @var \Cursos\Services\EmpleadoService
     */
    private $service;


    protected function setUp() : void {
        $this->db = new \Cursos\DB\MemoryStorage();
        $this->service = new \Cursos\Services\EmpleadoService($this->db);
    }

    public function testCanRegisterARequest() {

        $empleado =  $this->service->register("Email@Email.com","Pedro","Garcia","Programador","PGS",1);


        $this->assertEquals("Pedro", $empleado->getNombre());
        $this->assertEquals("Email@Email.com", $empleado->getEmail());
        $this->assertEquals("Programador", $empleado->getPuesto());
        $this->assertEquals("PGS", $empleado->getPrograma());
        $this->assertEquals("1", $empleado->getActivo());
    }

    public function testCanRegisterAndIsFound() {
        
        $this->service->register("Email2@Emai2l.com","Pedro2","Garcia2","Programador","PGS",1);
        
        $empleados = $this->service->findAll();

        $this->assertCount(1, $empleados);
    }

    public function testCanRegister2AndIsFound() {
        
        $this->service->register("Email2@Emai3l.com","Pedro3","Garcia3","Programador","PGS",1);
        $this->service->register("Email2@Emai4l.com","Pedro4","Garcia4","Programador","PGS",1);
        
        $empleados = $this->service->findAll();

        $this->assertCount(2, $empleados);
    }


    public function testICanupdateARequest() {
        $empleado1 = $this->service->register("Email5@Emai3l.com","Pedro5","Garcia5","Programador","PGS",1);
        $empleadoNuevo= ["email"=>"Email6@Emai3l.com","nombre"=>"Pedro6","apellido"=>"Garcia6","puesto"=>"Programador","programa"=>"PGS","activo"=>1];
        
        
        $r = $this->service->update($empleado2);

        $this->assertTrue($r);
    }



}