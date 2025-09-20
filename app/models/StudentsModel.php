<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StudentsModel
 * 
 * Automatically generated via CLI.
 */
class StudentsModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // Override with proper signature
    public function all($with_deleted = false)
    {
        return $this->db->table($this->table)
                        ->order_by($this->primary_key, 'DESC')
                        ->get_all();
    }

    public function search($keyword)
    {
        return $this->db->table($this->table)
                        ->like('firstname', $keyword)
                        ->or_like('lastname', $keyword)
                        ->or_like('email', $keyword)
                        ->order_by($this->primary_key, 'DESC')
                        ->get_all();
    }
}
