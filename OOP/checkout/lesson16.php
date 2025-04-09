<?php
	class Arr
	{
		private $numbers = []; // массив чисел
		
		public function __construct($numbers)
		{
			$this->numbers = $numbers; 
				// записываем массив $numbers в свойство 
		}
		
		// Добавляем еще одно число в наш массив:
		public function add($number)
		{
			$this->numbers[] = $number;
		}
		
		// Находим сумму чисел:
		public function getSum()
		{
			return array_sum($this->numbers);
		}
	}

    echo (new Arr([1, 2, 3]))->getSum();
?>