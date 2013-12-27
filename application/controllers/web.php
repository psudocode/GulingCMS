<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->theme->set_theme('cleanyblogs');
        }
	public function index()
	{
            $data['posts'] = Post::find_by_sql("SELECT * FROM posts WHERE post_type = 'post' ORDER BY id DESC");
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            if(!$data['posts']){
                redirect('web/error/404/NotFound');
            }
            
            
            $this->theme->view('posts', $data);
	}
	public function articles($slug  = NULL)
	{
            if(!$slug){
                redirect('web');
            }
            $data['posts'] = Post::all(array('slug' => $slug, 'post_status' => 'active'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            if(!$data['posts']){
                redirect('web/error/404/NotFound');
            }
            
            
            $this->theme->view('single', $data);
	}
	public function pages($slug = NULL)
	{
            if(!$slug){
                redirect('web');
            }
            $data['posts'] = Post::all(array('slug' => $slug, 'post_status' => 'active'));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            if(!$data['posts']){
                redirect('web/error/404/NotFound');
            }
            
            $this->theme->view('page', $data);
	}
	public function categories($slug)
	{
            if(!$slug){
                redirect('web');
            }
            // $join = 'LEFT JOIN post_to_categories a ON(posts.id = a.post_id) WHERE category_id = '.$id;
            $join = " LEFT JOIN post_to_categories a "
                    . "ON(posts.id = a.post_id) "
                    . "WHERE a.category_id = ".Category::first(array('slug' => $slug))->id." "
                    . "AND post_type = 'post' ORDER BY id DESC";
            $data['posts'] = Post::all(array('joins' => $join));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            if(!$data['posts']){
                redirect('web/error/404/NotFound');
            }
            
            
            $this->theme->view('categories', $data);
	}
	public function tags($slug)
	{
            if(!$slug){
                redirect('web');
            }
            
            // $join = 'LEFT JOIN post_to_tags a ON(posts.id = a.post_id) WHERE tag_id = '.$id.' AND post_status = "active"' ;
            $join = " LEFT JOIN post_to_tags a "
                    . "ON(posts.id = a.post_id) "
                    . "WHERE a.tag_id = ".Tag::first(array('slug' => $slug))->id." "
                    . "AND post_type = 'post' ORDER BY id DESC";
            $data['posts'] = Post::all(array('joins' => $join));
            $data['navs'] = Post::all(array('post_type' => 'page'));
            
            if(!$data['posts']){
                redirect('web/error/404/NotFound');
            }
            
            
            $this->theme->view('tags', $data);
	}
        
	public function error($errco = 0, $errtit = NULL)
	{   
            $data['errors'] = array('codes' => $errco, 'title' => $errtit);
            $this->theme->set_theme('errors');
            $this->theme->view('errors', $data);
	}
}
//test
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */