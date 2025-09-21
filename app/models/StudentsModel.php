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
public function paginate_with_search($q, $records_per_page, $page)
    {
        $query = $this->db->table($this->table);

        if (!empty($q)) {
            $query->like('firstname', $q)
                  ->or_like('lastname', $q)
                  ->or_like('email', $q);
        }

        // Clone before applying pagination
        $countQuery = clone $query;
        $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

        $data['records'] = $query->order_by($this->primary_key, 'DESC')
                                 ->pagination($records_per_page, $page)
                                 ->get_all();

        return $data;
    }

}
