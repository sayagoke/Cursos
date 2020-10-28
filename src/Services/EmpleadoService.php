<?php

namespace Cursos\Services;

use \Cursos\DB\StorageInterface;

final class EmpleadoService {

    /**
     * @var StorageInterface
     */
    private $db;

    private static $schema = 'employees';

    public function __construct(StorageInterface $db) {
        $this->db = $db;
    }

    public function register( $email,  $nombre,  $apellido,  $puesto,  $programa,  $activo) {

        $empleado = new \Cursos\Models\Employee($email,  $nombre,  $apellido,  $puesto,  $programa,  $activo);
        $this->db->save(self::$schema, $empleado->asArray());
        return $empleado;
    }

     /**
     * @return Empleado[]
     */
    public function findAll() {
        $data = $this->db->findAll(self::$schema);
        $out = array();
        foreach($data as $d) {
            if ($d['activo'] == 1) {
                $out[] = new \Cursos\Models\Employee($d['email'], $d['nombre'], $d['apellido'], $d['puesto'], $d['programa'], $d['activo']);
            }
        }
        return $out;
    }

}