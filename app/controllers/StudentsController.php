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
    }
public function index() {
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $q = $_GET['q'] ?? '';

    $records_per_page = 5;

    $all = $this->StudentsModel->paginate_with_search($q, $records_per_page, $page);

    $students = $all['records'];
    $total_rows = $all['total_rows'];

    $this->pagination->set_options([
        'first_link' => '⏮ First',
        'last_link'  => 'Last ⏭',
        'next_link'  => 'Next →',
        'prev_link'  => '← Prev',
        'page_delimiter' => '&page=',
    ]);
    $this->pagination->set_theme('bootstrap');

   $this->pagination->initialize(
    $total_rows,
    $records_per_page,
    $page,
    '/students?q='.$q
);

    $this->call->view('studentviewindex', [
        'students' => $students,
        'search'   => $q,
        'page'     => $this->pagination->paginate(),
        'role'     => $this->session->userdata('role') // pass role to view
    ]);
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
