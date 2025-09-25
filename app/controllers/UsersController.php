<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 * 
 * Automatically generated via CLI.
 */

class UsersController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('UsersModel');
        $this->call->library('session');
    }

    public function registerForm() {
        $this->call->view('register');
    }

    public function register() {
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role     = $_POST['role']; // admin or user

        $this->UsersModel->createUser([
            'username' => $username,
            'email'    => $email,
            'password' => $password,
            'role'     => $role
        ]);

        header('Location: /login');
        exit;
    }

    public function loginForm() {
        $this->call->view('login');
    }

    public function login() {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->UsersModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('role', $user['role']);
            header('Location: /students');
        } else {
            echo "Invalid credentials";
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        header('Location: /login');
    }
}