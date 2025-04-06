<?php 
    class User {
        private $name;
        private $surname;
        private $salary;

        public function get_name(){
            return $this->name;
        }
        public function get_surname(){
            return $this->surname;
        }
        public function get_salary(){
            return "<p>$this->salary \$</p>";
        } 

        public function set_salary($salary){
            $this->salary = $salary;
        }
    }
?>