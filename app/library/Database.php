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
}