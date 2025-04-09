<?php
class UserController extends Controller {
    public function register() {
        $userModel = new User();
        
        if ($userModel->isLoggedIn()) {
            $this->redirect('/');
        }
        
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
            
            if (empty($name)) {
                $errors['name'] = 'Имя обязательно для заполнения';
            }
            
            if (empty($email)) {
                $errors['email'] = 'Email обязателен для заполнения';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Некорректный формат email';
            } elseif ($userModel->getByEmail($email)) {
                $errors['email'] = 'Этот email уже используется';
            }
            
            if (empty($password)) {
                $errors['password'] = 'Пароль обязателен для заполнения';
            } elseif (strlen($password) < 6) {
                $errors['password'] = 'Пароль должен содержать минимум 6 символов';
            } elseif ($password !== $confirmPassword) {
                $errors['confirm_password'] = 'Пароли не совпадают';
            }
            
            if (empty($errors)) {
                $userId = $userModel->register([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password
                ]);
                
                if ($userId) {
                    $userModel->login($email, $password);
                    
                    if (isset($_SESSION['redirect_after_login'])) {
                        $redirect = $_SESSION['redirect_after_login'];
                        unset($_SESSION['redirect_after_login']);
                        $this->redirect($redirect);
                    } else {
                        $this->redirect('/');
                    }
                } else {
                    $errors['general'] = 'Ошибка при регистрации';
                }
            }
        }
        
        $this->render('user/register', [
            'errors' => $errors
        ]);
    }
    
    public function login() {
        $userModel = new User();
        
        if ($userModel->isLoggedIn()) {
            $this->redirect('/');
        }
        
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if (empty($email) || empty($password)) {
                $errors['general'] = 'Заполните все поля';
            } else {
                if ($userModel->login($email, $password)) {
                    if (isset($_SESSION['redirect_after_login'])) {
                        $redirect = $_SESSION['redirect_after_login'];
                        unset($_SESSION['redirect_after_login']);
                        $this->redirect($redirect);
                    } else {
                        $this->redirect('/');
                    }
                } else {
                    $errors['general'] = 'Неверный email или пароль';
                }
            }
        }
        
        $this->render('user/login', [
            'errors' => $errors
        ]);
    }
    
    public function logout() {
        $userModel = new User();
        $userModel->logout();
        $this->redirect('/');
    }
    
    public function profile() {
        $userModel = new User();
        
        if (!$userModel->isLoggedIn()) {
            $this->redirect('/user/login');
        }
        
        $user = $userModel->getById($_SESSION['user_id']);
        $orderModel = new Order();
        $orders = $orderModel->getUserOrders($_SESSION['user_id']);
        
        $this->render('user/profile', [
            'user' => $user,
            'orders' => $orders
        ]);
    }
}
?>
