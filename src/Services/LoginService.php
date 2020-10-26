<?php


namespace Cursos\Services;

use \Cursos\DB\StorageInterface;

final class LoginService {

    /**
     * @var StorageInterface
     */
    private $db;

    private static $schema = 'users';

    public function __construct(StorageInterface $db){
        $this->db = $db;
    }

    public function register($username, $passwd) {
        $r = $this->db->save(self::$schema,
                        array('username'=> $username, 'passwd' => $passwd)
                    );
        return $r;
    }

    public function userExists($username) {
        $condition = new \Cursos\DB\Condition('username', '=', $username);
        $r = $this->db->findOne(self::$schema, array($condition));
        return !empty($r);
    }

    public function logIn($username, $passwd) {
        $condition = new \Cursos\DB\Condition('username', '=', $username);
        $r = $this->db->findOne(self::$schema, array($condition));
        if (empty($r)) {
            return false;
        }

        $_SESSION['logged'] = true;
        return $r['passwd'] == $passwd;
    }


    public function isLogged() {
        return !empty($_SESSION['logged']);
    }
}