<?php
class Programmer extends Employee {
    private $langs = [];

    public function get_langs(){
        return $this->langs;
    }

    public function set_langs($lang){
        $this->langs[] = $lang;
    }
}
?>