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
	public function articles($id, $title  = NULL)
	{
            $data['posts'] = Post::all(array('id' => $id, 'post_status' => 'active'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('single', $data);
	}
	public function pages($id, $title = NULL)
	{
            $data['posts'] = Post::all(array('id' => $id, 'post_status' => 'active'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('page', $data);
	}
	public function categories($id)
	{
            $join = 'LEFT JOIN post_to_categories a ON(posts.id = a.post_id) WHERE category_id = '.$id;
            $data['posts'] = Post::all(array('joins' => $join));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('categories', $data);
	}
	public function tags($id)
	{
            $join = 'LEFT JOIN post_to_tags a ON(posts.id = a.post_id) WHERE tag_id = '.$id.' AND post_status = "active"' ;
            $data['posts'] = Post::all(array('joins' => $join));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            $this->theme->view('tags', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */