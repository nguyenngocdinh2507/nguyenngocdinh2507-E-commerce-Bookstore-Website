<?php
    class BookEntity{
        private $bookId;
        private $name;
        private $price;
        private $imageUrl;
        private $author;
        private $categoryId;
        private $description;
        private $isActive = 0;

        /**
         * @param $bookId
         * @param $description
         * @param $categoryId
         * @param $author
         * @param $imageUrl
         * @param $price
         * @param $name
         */
        public function __construct($bookId, $name, $price, $author, $imageUrl, $description, $categoryId)
        {
            $this->bookId = $bookId;
            $this->name = $name;
            $this->price = $price;
            $this->author = $author;
            $this->imageUrl = $imageUrl;
            $this->description = $description;
            $this->categoryId = $categoryId;
        }


        public function getIsActive(): int
        {
            return $this->isActive;
        }

        public function setIsActive(int $isActive): void
        {
            $this->isActive = $isActive;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }

        /**
         * @return mixed
         */
        public function getAuthor()
        {
            return $this->author;
        }

        /**
         * @param mixed $author
         */
        public function setAuthor($author): void
        {
            $this->author = $author;
        }

        /**
         * @return mixed
         */
        public function getCategoryId()
        {
            return $this->categoryId;
        }

        /**
         * @param mixed $categoryId
         */
        public function setCategoryId($categoryId): void
        {
            $this->categoryId = $categoryId;
        }

        /**
         * @return mixed
         */
        public function getImageUrl()
        {
            return $this->imageUrl;
        }

        /**
         * @param mixed $imageUrl
         */
        public function setImageUrl($imageUrl): void
        {
            $this->imageUrl = $imageUrl;
        }

        /**
         * @return mixed
         */
        public function getBookId()
        {
            return $this->bookId;
        }

        /**
         * @param mixed $bookId
         */
        public function setBookId($bookId): void
        {
            $this->bookId = $bookId;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price): void
        {
            $this->price = $price;
        }


    }
?>