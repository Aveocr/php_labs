<?php
	class User
	{
		private static $count = 0;
		public $name;
		
		public function __construct($name)
		{
			$this->name = $name;
			
			// Увеличиваем счетчик при создании объекта:
			self::$count++;
		}
		
		// Метод, возвращающий значение счетчика:
		public static function getCount()
		{
			// Выводим значение счетчика:
			return self::$count;
		}
	}
?>