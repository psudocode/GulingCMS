<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->theme->set_theme('sb-admin');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->theme->view('welcome_message');
    }
    public function posts() {
        $this->theme->view('admin/posts');
    }
    public function pages() {
        $this->theme->view('welcome_message');
    }
    public function categories() {
        $this->theme->view('welcome_message');
    }
    public function displays() {
        $this->theme->view('welcome_message');
    }
    public function settings() {
        $this->theme->view('welcome_message');
    }
    public function faq() {
        $this->theme->view('welcome_message');
    }
    public function about() {
        $this->theme->view('welcome_message');
    }
    

}
