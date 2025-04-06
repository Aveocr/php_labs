<?php
	class User
	{
		public $surname; // фамилия
		public $name; // имя
		public $patronymic; // отчество
		
		public function __construct($surname, $name, $patronymic)
		{
			$this->surname = $surname;
			$this->name = $name;
			$this->patronymic = $patronymic;
		}
	}

    $user = new User('Иванов', 'Иван', 'Иванович');
	
	$props = ['surname', 'name', 'patronymic'];
	echo $user->{$props[0]} . '\n'; // выведет 'Иванов'
    echo $user->{$props[1]} . '\n';
    echo $user->{$props[2]} . '\n';
?>
?>