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
    $builder = $this->db->table($this->table)
                        ->like('firstname', $keyword)
                        ->or_like('lastname', $keyword)
                        ->or_like('email', $keyword)
                        ->order_by($this->primary_key, 'DESC');

    $result = $builder->get_all();

    // Debugging output (safe for LavaLust)
   
    return $result;
}
public function page($q, $records_per_page = null, $page = null) {
    if (is_null($page)) {
        return $this->db->table($this->table)->get_all();
    } else {
        $query = $this->db->table($this->table);

        if (!empty($q)) {
            $query->like('firstname', '%'.$q.'%')
                  ->or_like('lastname', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');
        }

        // Clone before pagination to count total
        $countQuery = clone $query;

        $data['total_rows'] = $countQuery->select_count('*', 'count')
                                         ->get()['count'];

        $data['records'] = $query->pagination($records_per_page, $page)
                                 ->get_all();

        return $data;
    }
}


}
