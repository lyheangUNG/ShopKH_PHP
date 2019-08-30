<?php
    class DB{
        public $db;
        public function connectDBProduct(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db_name = "shopkh";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db_name);
            $this->db = $conn;
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            // echo "Connected successfully";
        
            return $this;
            $conn->close();
        }
        public function listDB($sql){
            // $conn = connectDBProduct();
            $result = $this->db->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                return $result;
            } else {
                echo "0 results";
            }
            $this->db->close();
        }
        public function insertDB($sql){
            if ($this->db->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->db->error;
            }
            $this->db->close();
        }
        public function deleteDB($sql){
            if ($this->db->query($sql) === TRUE) {
                echo "The selected record has been deleted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->db->error;
            }
            $this->db->close();
        }
        public function updateDB($sql){
            if ($this->db->query($sql) === TRUE) {
                echo "The selected record has been updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->db->error;
            }
            $this->db->close();
        }
    }

?>