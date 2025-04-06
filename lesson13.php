<?php
	class Arr
	{
		private $numbers = []; // задаем 

		
		public function add($num)
		{
			$this->numbers = array_merge($this->numbers, $num);
		}
		
		public function getSum()
		{
			return array_sum($this->numbers);
		}

        public function getAvg(){
            return array_sum($this->numbers) / count($this->numbers);
        }
	}


    $number = new Arr;
	
    $number->add([2, 2, 2, 2, 5, 3, 2]);
    echo "AVG is " . $number->getAvg();
?>