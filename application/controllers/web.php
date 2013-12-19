<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->theme->set_theme('cleanyblogs');
        }
	public function index()
	{
            $data['posts'] = Post::all(array('post_type' => 'post'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('posts', $data);
	}
	public function articles($id, $title)
	{
            $data['posts'] = Post::all(array('id' => $id, 'post_status' => 'active'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('single', $data);
	}
	public function pages($id, $title)
	{
            $data['posts'] = Post::all(array('id' => $id, 'post_status' => 'active'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('single', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */