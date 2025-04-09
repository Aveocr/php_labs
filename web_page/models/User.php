<?php 
class User extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }
    
    public function getByEmail($email) {
        return $this->db->selectOne(
            "SELECT * FROM users WHERE email = :email",
            ['email' => $email]
        );
    }
    
    public function register($userData) {
        // Хеширование пароля
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        return $this->create($userData);
    }
    
    public function login($email, $password) {
        $user = $this->getByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            // Успешная авторизация
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            return true;
        }
        
        return false;
    }
    
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
    }
    
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}

?>