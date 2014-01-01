<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

    public function add_post() {
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('images'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if($data_file){
            $post->image_feature = 'uploads/'.$data_file['upload_data']['file_name'];
        }
        $post->created_at = now();
        $post->created_by = $this->session->userdata('user_id');
        $post->post_type = 'post';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();


        if ($this->input->post('categories')) {
            $cats = explode(",", $this->input->post('categories'));
            foreach ($cats as $caty) {
                if (!Category::find_by_title(trim($caty))) {
                    $cat = new Category();
                    $cat->title = trim($caty);
                    $cat->slug = url_title($cat->title, '-', TRUE);
                    $cat->save();
                } else {
                    $cat = Category::find_by_title(trim($caty));
                }
                
                if (!Post_to_category::find('all', array('post_id' => $post->id, 'category_id' => $cat->id))) {
                    $ptc = new Post_to_category();
                    $ptc->post_id = $post->id;
                    $ptc->category_id = $cat->id;
                    $ptc->save();
                }
            }
        }

        if ($this->input->post('tags')) {
            $tags = explode(",", $this->input->post('tags'));
            foreach ($tags as $tagy) {
                
                if (!Tag::find_by_title(trim($tagy))) {
                    $tag = new Tag();
                    $tag->title = trim($tagy);
                    $tag->slug = url_title($tag->title, '-', TRUE);
                    $tag->save();
                } else {
                    $tag = Tag::find_by_title(trim($tagy));
                }
                if (!Post_to_tag::find('all', array('post_id' => $post->id, 'tag_id' => $tag->id))) {
                    $ptc = new Post_to_tag();
                    $ptc->post_id = $post->id;
                    $ptc->tag_id = $tag->id;
                    $ptc->save();
                }
            }
        }
        

        $this->session->set_flashdata('info', 'The post #' . $post->id . ' has been created <br/> '.(isset($error) ? $error['error'] : ''));
        redirect('admin/posts');
    }

    public function delete_post($id) {
        $post = Post::find($id);
        $post->delete();

        Post_to_tag::delete_all(array('conditions' => array('post_id' => $id)));
        Post_to_category::delete_all(array('conditions' => array('post_id' => $id)));

        $this->session->set_flashdata('info', 'The post #' . $id . ' has been deleted');
        redirect('admin/posts');
    }

    public function edit_post($id) {
        $data['post'] = Post::find($id);
        $this->theme->view('admin/form_edit_post', $data);
    }

    public function update_post($id) {
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('images'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if($data_file){
            $post->image_feature = 'uploads/'.$data_file['upload_data']['file_name'];
        }
        $post->updated_at = now();
        $post->updated_by = $this->session->userdata('user_id');
        $post->post_type = 'post';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();

        if ($this->input->post('categories')) {
            $cats = explode(",", $this->input->post('categories'));
            foreach ($cats as $caty) {
                
                if (!Category::find_by_title(trim($caty))) {
                    $cat = new Category();
                    $cat->title = trim($caty);
                    $cat->slug = url_title($cat->title, '-', TRUE);
                    $cat->save();
                } else {
                    $cat = Category::find_by_title(trim($caty));
                }
                
                if (!Post_to_category::find('all', array('post_id' => $post->id, 'category_id' => $cat->id))) {
                    $ptc = new Post_to_category();
                    $ptc->post_id = $post->id;
                    $ptc->category_id = $cat->id;
                    $ptc->save();
                }
            }
        }

        if ($this->input->post('tags')) {
            $tags = explode(",", $this->input->post('tags'));
            foreach ($tags as $tagy) {
                
                if (!Tag::find_by_title(trim($tagy))) {
                    $tag = new Tag();
                    $tag->title = trim($tagy);
                    $tag->slug = url_title($tag->title, '-', TRUE);
                    $tag->save();
                } else {
                    $tag = Tag::find_by_title(trim($tagy));
                }
                if (!Post_to_tag::find('all', array('post_id' => $post->id, 'tag_id' => $tag->id))) {
                    $ptc = new Post_to_tag();
                    $ptc->post_id = $post->id;
                    $ptc->tag_id = $tag->id;
                    $ptc->save();
                }
            }
        }

        $this->session->set_flashdata('info', 'The post #' . $post->id . ' has been updated <br/> '.(isset($error) ? $error['error'] : ''));
        redirect('admin/posts');
    }

    public function posts() {
        $data['posts'] = Post::all(array('post_type' => 'post'));
        $this->theme->view('admin/posts', $data);
    }

    public function form_posts() {
        $this->theme->view('admin/form_posts');
    }

    public function pages() {
        $data['posts'] = Post::all(array('post_type' => 'page'));
        $this->theme->view('admin/pages', $data);
    }
    
    public function form_pages() {
        $this->theme->view('admin/form_pages');
    }
    
    public function add_page() {
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('images'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if($data_file){
            $post->image_feature = 'uploads/'.$data_file['upload_data']['file_name'];
        }
        $post->created_at = now();
        $post->created_by = $this->session->userdata('user_id');
        $post->post_type = 'page';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();


        if ($this->input->post('categories')) {
            $cats = explode(",", $this->input->post('categories'));
            foreach ($cats as $caty) {
                if (!Category::find_by_title(trim($caty))) {
                    $cat = new Category();
                    $cat->title = trim($caty);
                    $cat->save();
                } else {
                    $cat = Category::find_by_title(trim($caty));
                }
                
                if (!Post_to_category::find('all', array('post_id' => $post->id, 'category_id' => $cat->id))) {
                    $ptc = new Post_to_category();
                    $ptc->post_id = $post->id;
                    $ptc->category_id = $cat->id;
                    $ptc->save();
                }
            }
        }

        if ($this->input->post('tags')) {
            $tags = explode(",", $this->input->post('tags'));
            foreach ($tags as $tagy) {
                
                if (!Tag::find_by_title(trim($tagy))) {
                    $tag = new Tag();
                    $tag->title = trim($tagy);
                    $tag->save();
                } else {
                    $tag = Tag::find_by_title(trim($tagy));
                }
                if (!Post_to_tag::find('all', array('post_id' => $post->id, 'tag_id' => $tag->id))) {
                    $ptc = new Post_to_tag();
                    $ptc->post_id = $post->id;
                    $ptc->tag_id = $tag->id;
                    $ptc->save();
                }
            }
        }

        $this->session->set_flashdata('info', 'The page #' . $post->id . ' has been created <br/> '.(isset($error) ? $error['error'] : ''));
        redirect('admin/posts');
    }

    public function delete_page($id) {
        $post = Post::find($id);
        $post->delete();

        Post_to_tag::delete_all(array('conditions' => array('post_id' => $id)));
        Post_to_category::delete_all(array('conditions' => array('post_id' => $id)));

        $this->session->set_flashdata('info', 'The page #' . $id . ' has been deleted');
        redirect('admin/pages');
    }

    public function edit_page($id) {
        $data['post'] = Post::find($id);
        $this->theme->view('admin/form_edit_page', $data);
    }

    public function update_page($id) {
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('images'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if($data_file){
            $post->image_feature = 'uploads/'.$data_file['upload_data']['file_name'];
        }
        $post->updated_at = now();
        $post->updated_by = $this->session->userdata('user_id');
        $post->post_type = 'page';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();

        if ($this->input->post('categories')) {
            $cats = explode(",", $this->input->post('categories'));
            foreach ($cats as $caty) {
                
                if (!Category::find_by_title(trim($caty))) {
                    $cat = new Category();
                    $cat->title = trim($caty);
                    $cat->save();
                } else {
                    $cat = Category::find_by_title(trim($caty));
                }
                
                if (!Post_to_category::find('all', array('post_id' => $post->id, 'category_id' => $cat->id))) {
                    $ptc = new Post_to_category();
                    $ptc->post_id = $post->id;
                    $ptc->category_id = $cat->id;
                    $ptc->save();
                }
            }
        }

        if ($this->input->post('tags')) {
            $tags = explode(",", $this->input->post('tags'));
            foreach ($tags as $tagy) {
                
                if (!Tag::find_by_title(trim($tagy))) {
                    $tag = new Tag();
                    $tag->title = trim($tagy);
                    $tag->save();
                } else {
                    $tag = Tag::find_by_title(trim($tagy));
                }
                if (!Post_to_tag::find('all', array('post_id' => $post->id, 'tag_id' => $tag->id))) {
                    $ptc = new Post_to_tag();
                    $ptc->post_id = $post->id;
                    $ptc->tag_id = $tag->id;
                    $ptc->save();
                }
            }
        }

        $this->session->set_flashdata('info', 'The Page #' . $post->id . ' has been updated <br/> '.(isset($error) ? $error['error'] : ''));
        redirect('admin/posts');
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
