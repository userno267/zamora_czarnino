<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UsersModel
 * 
 * Automatically generated via CLI.
 */

class UsersModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

   public function __construct() {
    parent::__construct();
    $this->call->library('database'); // ensures $this->db exists
}


    public function findByEmail($email) {
        return $this->db->table($this->table)
                        ->where('email', $email)
                        ->get();
    }

    public function createUser($data) {
        return $this->db->table($this->table)->insert($data);
    }

    
}
