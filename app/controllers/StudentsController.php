<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentsController
 * 
 * Automatically generated via CLI.
 */

class StudentsController extends Controller {
public function __construct() {
        parent::__construct();
        $this->call->model('StudentsModel');
        $this->call->database();
        $this->call->library('pagination'); // ✅ load pagination library
    }
public function index() 
{
    $page = 1;
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $this->io->get('page'); // LavaLust input helper
    }

    $q = '';
    if (isset($_GET['q']) && !empty($_GET['q'])) {
        $q = trim($this->io->get('q'));
    }

    $records_per_page = 5; // adjust as you like

    $all = $this->StudentsModel->page($q, $records_per_page, $page);
    $data['students'] = $all['records'];
    $total_rows = $all['total_rows'];

    // Configure pagination
    $this->pagination->set_options([
        'first_link'     => '⏮ First',
        'last_link'      => 'Last ⏭',
        'next_link'      => 'Next →',
        'prev_link'      => '← Prev',
        'page_delimiter' => '&page='
    ]);
    $this->pagination->set_theme('bootstrap'); // "tailwind" also supported
    $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('students').'?q='.$q);

    $data['page'] = $this->pagination->paginate();
    $data['search'] = $q;

    $this->call->view('studentviewindex', $data);
}


    public function create() {
        $this->call->view('form', [
            'mode' => 'create',
            'action' => '/students/store',
            'student' => []
        ]);
    }

    public function store() {
        $data = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
        ];
        $this->StudentsModel->insert($data);
        header('Location: /students');
    }
    public function edit($id) {
        // ✅ Correct way to fetch by primary key
        $student = $this->StudentsModel->find($id);

        if (empty($student)) {
            echo "Student with ID {$id} not found.";
            return;
        }

        $this->call->view('form', [
            'mode' => 'edit',
            'action' => "/students/update/{$id}",
            'student' => $student
        ]);
    }

 public function update($id) {
        $data = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
        ];
        $this->StudentsModel->update($id, $data);
        header('Location: /students');
    }

public function delete($id) {
    $this->StudentsModel->delete($id);
        header('Location: /students');

    exit;
}

}
