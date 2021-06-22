<?php 
namespace models; 
use \PDO;

class Database 
{
    protected $username = 'admin';
    protected $password = 'admin';
    protected $db;

    static function getInstance() {
        if (is_null(self::$_instance)) {
            try
            {
                self::$_instance = new \PDO('mysql:host=localhost;dbname=record;charset=utf8', self::$username, self::$password); // $options
                return self::$_instance;
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
        } else {
            return self::$_instance;
        }
    }


    protected function connect()
    {

        if (is_null($this->db)) {
            try
            {
                $this->db = new \PDO('mysql:host=localhost;dbname=record;charset=utf8', $this->username, $this->password); // $options
                return $this->db;
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return $this->db;
    }
}