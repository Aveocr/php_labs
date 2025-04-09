<?php 
    class Student {
        public $name;
        public $course;

        // внутри метода
        public function transferToNextCourse_1(){
            if ($this->course + 1 <= 5){
                $this->course += 1;
            }
            else {
                throw new Exception("Course is not correct\n");
            }
            return $this->course;
        }
        

        public function transferToNextCourse_2(){
            if ($this->isCourseCorrect()){
                $this->course += 1;
                return $this->course;
            }
            else {
                throw new Exception("Course is not correct");
            }
            
        }

        private function isCourseCorrect(){
            return $this->course <= 5 ? true : false;

        }
    }
    
    $student = new Student();
    $student->course = 3;
    
    echo $student->transferToNextCourse_1();
    echo "\n";
    echo $student->transferToNextCourse_2();
    
?>