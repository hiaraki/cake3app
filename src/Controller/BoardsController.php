<?php
namespace App\Controller;

class BoardsController extends AppController {
    public function index () {
        $data = null;
        $data = $this->Boards->find('all');
        $this->set('data', $data);
    }
}