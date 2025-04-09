<?php
	class Student
	{
		private $name;
		private $course;
		
		public function __construct($name)
		{
			$this->name = $name;
			$this->course = 1;
		}
		
		// Геттер имени:
		public function getName()
		{
			return $this->name;
		}
		
		// Геттер курса:
		public function getCourse()
		{
			return $this->course;
		}
		
		// Перевод студента на новый курс:
		public function transferToNextCourse()
		{
			if ($this->course + 1 <= 5){
                $this->course += 1;
            }
            else {
                throw new Exception("Course is not correct\n");
            }
		}
	}
?>