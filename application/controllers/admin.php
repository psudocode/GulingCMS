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
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->content = $this->input->post('content');
        $post->created_at = now();
        $post->created_by = $this->session->userdata('user_id');
        $post->image_feature = $this->input->post('images');
        $post->post_type = 'post';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();


        if ($this->input->post('categories')) {
            $cats = explode(",", $this->input->post('categories'));
            foreach ($cats as $caty) {
                
                if (!Category::find_by_title($caty)) {
                    $cat = new Category();
                    $cat->title = trim($caty);
                    $cat->save();
                } else {
                    $cat = Category::find_by_title($caty);
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
                
                if (!Tag::find_by_title($tagy)) {
                    $tag = new Tag();
                    $tag->title = trim($tagy);
                    $tag->save();
                } else {
                    $tag = Tag::find_by_title($tagy);
                }
                if (!Post_to_tag::find('all', array('post_id' => $post->id, 'tag_id' => $tag->id))) {
                    $ptc = new Post_to_tag();
                    $ptc->post_id = $post->id;
                    $ptc->tag_id = $tag->id;
                    $ptc->save();
                }
            }
        }
        $this->session->set_flashdata('info', 'The post #' . $post->id . ' has been created');
        redirect('admin/posts');
    }

    public function delete_post($id) {
        $post = Post::find($id);
        $post->delete();

        $tag = Post_to_tag::find_by_post_id($id);
        $tag->delete();

        $cat = Post_to_category::find_by_post_id($id);
        $cat->delete();

        $this->session->set_flashdata('info', 'The post #' . $id . ' has been deleted');
        redirect('admin/posts');
    }

    public function edit_post($id) {
        $data['post'] = Post::find($id);
        $this->theme->view('admin/form_edit_post', $data);
    }

    public function update_post($id) {
        $post = Post::find($id);
        $post->title = $this->input->post('title-post');
        $post->content = $this->input->post('content');
        $post->updated_at = now();
        $post->updated_by = $this->session->userdata('user_id');
        $post->image_feature = $this->input->post('images');
        $post->post_type = 'post';
        $post->flag_sticky = $this->input->post('sticky');
        $post->save();

        if ($this->input->post('categories')) {
            $cats = explode(",", $this->input->post('categories'));
            foreach ($cats as $caty) {
                
                if (!Category::find_by_title($caty)) {
                    $cat = new Category();
                    $cat->title = trim($caty);
                    $cat->save();
                } else {
                    $cat = Category::find_by_title($caty);
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
                
                if (!Tag::find_by_title($tagy)) {
                    $tag = new Tag();
                    $tag->title = trim($tagy);
                    $tag->save();
                } else {
                    $tag = Tag::find_by_title($tagy);
                }
                if (!Post_to_tag::find('all', array('post_id' => $post->id, 'tag_id' => $tag->id))) {
                    $ptc = new Post_to_tag();
                    $ptc->post_id = $post->id;
                    $ptc->tag_id = $tag->id;
                    $ptc->save();
                }
            }
        }
        $this->session->set_flashdata('info', 'The post #' . $id . ' has been updated');
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
