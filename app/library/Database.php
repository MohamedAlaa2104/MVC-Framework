<?php

class Database
{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_password = DB_PASSWORD;
    private $db_name = DB_NAME;
    private $options = array( PDO::ATTR_PERSISTENT =>true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
    private $db_handeller;
    private $statment;
    private $error;

    public function __construct()
    {
        $dns = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
        
        $this->stablishConnection($dns);
    }

    public function stablishConnection($dns)
    {
        try{
            $this->db_handeller = new PDO($dns, $this->db_user, $this->db_password, $this->options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->statment = $this->db_handeller->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type))
        {
            switch (true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statment->bindValue($param, $value, $type);
        }
    }

    public function execute()
    {
        return $this->statment->execute();
    }

    public function getResults()
    {
        $this->execute();
        return $this->statment->fetchAll(PDO::FETCH_OBJ);
    }

    public function single()
    {
        $this->execute();
        return $this->statment->fetch(PDO::FETCH_OBJ);
    }
}