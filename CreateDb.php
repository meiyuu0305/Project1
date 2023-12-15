<?php
class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;

        // class constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $servername = "localhost",
        $username = "root",
        $password = "root"
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);
        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);
            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR (200) NOT NULL,
                             price FLOAT(7,2),
                             img text
                            );";
            $sql1 = " CREATE TABLE IF NOT EXISTS orders
            (name VARCHAR(30) NOT NULL,
             phone VARCHAR (15) NOT NULL,
             creditCard VARCHAR (13) NOT NULL, 
             zip INT(5),
             shipping_loca VARCHAR(200),
             order_id VARCHAR(11)
            );";
             $sql2 = " CREATE TABLE IF NOT EXISTS order_item
             (order_id INT(11),
             product_id VARCHAR(11),
             price FLOAT(4,2)
             );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }
            if (!mysqli_query($this->con, $sql1)){
                echo "Error creating table : " . mysqli_error($this->con);
            }
            if (!mysqli_query($this->con, $sql2)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }
    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

}