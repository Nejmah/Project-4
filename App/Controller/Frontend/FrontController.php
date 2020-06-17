<?php
namespace App\Controller\Frontend;

use App\Controller\Controller;

class FrontController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/frontend/");
    }

    public function home() {
        //$this->render('home', []);
        $this->response('home');
    }

    public function about() {
        $this->response('about');
    }

    public function login() {
        $this->response('login');
    }
}
?>