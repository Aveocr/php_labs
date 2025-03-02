<?php

class Rectangle {
    public $height; 
    public $weight;

    public function getSquare(){
        return $this->height * $this->weight;
    }

    public function getPerimeter(){
        return 2 * ($this->height + $this->weight);
    }
}


?>