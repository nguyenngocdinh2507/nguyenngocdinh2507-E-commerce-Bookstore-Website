<?php     
    class Database {
        private $conn;

        public function __construct(){
            //Include config
            include_once 'config/config.php';

            //Use config
            $this->conn = $connect;

            if($this->conn == false){
                die("Connect is not connected" . mysqli_connect_error());
            }
        }

        //truy van sql
        public function query($sql): bool|mysqli_result{
            return mysqli_query($this->conn, $sql);
        }

        //lay tat ca ket qua tu truy van
        public function fetchAll($result): array|bool|null{
            return mysqli_fetch_all($this->conn, $result);
        }

        //Lay mot ket qua tu truy van
        public function fetchOne($result): array|bool|null{
            return mysqli_fetch_assoc($result);
        }

        //Dong ket noi
        public function close(){
            mysqli_close($this->conn);
        }
    }


?>