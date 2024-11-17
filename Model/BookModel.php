<?php
    class BookModel{
        private $db;

        public function __construct(){
            //Khoi tao Database
            $this->db = new Database();
        }

        // lAY TAT CA THUC THE DOI THANH BookEntity
        public function getAllBooks()
        {
            $sql = "SELECT * FROM t_book";
            $result = $this->db->query($sql);
            $books = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $books[] = new BookEntity(
                    $row["book_id"],
                    $row["name"],
                    $row["price"],
                    $row["author"],
                    $row["image_url"],
                    $row["description"],
                    $row["category"]
                );
            }
            return $books;
        }

        //Lay danh sach theo ID tra ve thuc the Entity
        public function getBookById($id){
            $sql = "SELECT * FROM t_book WHERE book_id = $id";
            $result = $this->db->query($sql);
            $row = $this->db->fetchOne($result);

            if($row){
                return new BookEntity(
                    $row["book_id"],
                    $row["name"],
                    $row["price"],
                    $row["author"],
                    $row["image_url"],
                    $row["description"],
                    $row["category"]
                );
            }

            return null;

        }
    }
?>