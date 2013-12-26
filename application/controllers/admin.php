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

    public function add_post() {
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->content = $this->input->post('content');
        $post->created_at = now();
        $post->created_by = $this->session->userdata('user_id');
        $post->image_feature = $this->input->post('images');
        $post->post_type = 'post';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();


        $cats = explode(",", $this->input->post('categories'));
        foreach ($cats as $caty) {
            $cat = new Category();
            $cat->title = $caty;
            $cat->save();
            
            $ptc = new Post_to_category();
            $ptc->post_id = $post->id;
            $ptc->category_id = $cat->id;
            $ptc->save();
        }

        $tags = explode(",", $this->input->post('tags'));
        foreach ($tags as $tagy) {
            $tag = new Tag();
            $tag->title = $tagy;
            $tag->save();
            
            $ptc = new Post_to_tag();
            $ptc->post_id = $post->id;
            $ptc->tag_id = $tag->id;
            $ptc->save();
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
