<?php 
namespace models; 
use \PDO;

class Database 
{
    protected $username = 'admin';
    protected $password = 'admin';

    protected function connect($debug = false) 
    {
        if ($debug)
        {
            try 
            {
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL,
                    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
                ];
                $db = new \PDO('mysql:host=localhost;dbname=record;charset=utf8', $this->username, $this->password, $options); // $options
                return $db; 
            } 
            catch(Exception $e) 
            {
                die('Erreur : ' . $e->getMessage()); 
            }
        }
        else 
        {
            try 
            {
                $db = new \PDO('mysql:host=localhost;dbname=record;charset=utf8', $this->username, $this->password); // $options
                return $db; 
            } 
            catch(Exception $e) 
            {
                die('Erreur : ' . $e->getMessage()); 
            }
        }
        
    }
}