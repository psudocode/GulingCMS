<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
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
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if ($data_file) {
            $post->image_feature = 'uploads/' . $data_file['upload_data']['file_name'];
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


        $this->session->set_flashdata('info', 'The post #' . $post->id . ' has been created <br/> ' . (isset($error) ? $error['error'] : ''));
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
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if ($data_file) {
            $post->image_feature = 'uploads/' . $data_file['upload_data']['file_name'];
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

        $this->session->set_flashdata('info', 'The post #' . $post->id . ' has been updated <br/> ' . (isset($error) ? $error['error'] : ''));
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
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if ($data_file) {
            $post->image_feature = 'uploads/' . $data_file['upload_data']['file_name'];
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

        $this->session->set_flashdata('info', 'The page #' . $post->id . ' has been created <br/> ' . (isset($error) ? $error['error'] : ''));
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
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if ($data_file) {
            $post->image_feature = 'uploads/' . $data_file['upload_data']['file_name'];
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

        $this->session->set_flashdata('info', 'The Page #' . $post->id . ' has been updated <br/> ' . (isset($error) ? $error['error'] : ''));
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

    public function users() {

        //list the users
        $this->data['users'] = $this->ion_auth->users()->result();
        foreach ($this->data['users'] as $k => $user) {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        $this->theme->view('admin/users', $this->data);
    }

    public function form_users() {


        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());

            redirect('admin/users');
        } else {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->theme->view('admin/form_users', $this->data);
        }
    }

    public function add_user() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if ($data_file) {
            $post->image_feature = 'uploads/' . $data_file['upload_data']['file_name'];
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

        $this->session->set_flashdata('info', 'The page #' . $post->id . ' has been created <br/> ' . (isset($error) ? $error['error'] : ''));
        redirect('admin/posts');
    }

    public function delete_user($id) {
        $post = Post::find($id);
        $post->delete();

        Post_to_tag::delete_all(array('conditions' => array('post_id' => $id)));
        Post_to_category::delete_all(array('conditions' => array('post_id' => $id)));

        $this->session->set_flashdata('info', 'The page #' . $id . ' has been deleted');
        redirect('admin/pages');
    }

    public function edit_user($id) {
        $data['post'] = Post::find($id);
        $this->theme->view('admin/form_edit_page', $data);
    }

    public function update_user($id) {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('images')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data_file = array('upload_data' => $this->upload->data());
        }
        $post = new Post();
        $post->title = $this->input->post('title-post');
        $post->slug = url_title($post->title, '-', TRUE);
        $post->content = $this->input->post('content');
        if ($data_file) {
            $post->image_feature = 'uploads/' . $data_file['upload_data']['file_name'];
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

        $this->session->set_flashdata('info', 'The Page #' . $post->id . ' has been updated <br/> ' . (isset($error) ? $error['error'] : ''));
        redirect('admin/posts');
    }

    public function about() {
        $this->theme->view('welcome_message');
    }


}
