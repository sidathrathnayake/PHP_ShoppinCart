<?php

class Database{

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    //Constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Producttb",
        $servername = "localhost",
        $username = "root",
        $password=""
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        //Create Connection
        $this->con = mysqli_connect($servername,$username,$password);

        //Check Connection
        if(!$this->con){
            die("Connection Failed : " . mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //Execute the query
        if(mysqli_query($this->con,$sql)){
            $this->con = mysqli_connect($servername,$username,$password,$dbname);

            //Create Table
            $sql = "CREATE TABLE IF NOT EXISTS $tablename
            (
                id INT(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
                names VARCHAR(50),
                preprice FLOAT,
                price FLOAT,
                decs VARCHAR(255),
                images VARCHAR(100)
            );";

        if(!mysqli_query($this->con,$sql)){
            echo "Eroor creating table: " .mysqli_error($this->con);
        }

        }
        else{
            return false;
        }


    }
    //Get Data from database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con,$sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

}