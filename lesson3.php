<?php 
class User1
{
    public $name;
    public $age;
    
    // Создаем метод:
    public function show()
    {
        return 'hello, world';
    }
}

$user1 = new User1;
$user1->name = 'john';
$user1->age = 25;

// Вызовем наш метод:
echo $user1->show();

echo '\n';
class User2
{
    public $name;
    public $age;
    
    // Создаем метод:
    public function show($str)
    {
        return $str . ' something ';
    }
}


$user2 = new User2;
$user2->name = 'john';
$user2->age = 25;

// Вызовем наш метод:
echo $user2->show("Hi");
?>