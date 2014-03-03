<?php

class Projects extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper("form");
            $this->load->model('projects_model');
        }

        //--------------------------------------------------------------------

        public function index()
        {
            $this->load->helper('typography');

            $projects = $this->projects_model->order_by('created_on', 'desc')
                                      ->find_all();

            Template::set('projects', $projects);

            Template::render();
        }

        //--------------------------------------------------------------------

        public function project($id,$notemplate = FALSE)
        {
            $this->load->helper('typography');

            $data['project'] = $this->projects_model->order_by('created_on', 'asc')
                                      ->limit(1)
                                      ->find($id);

            if($notemplate) {
                $this->load->view("project",$data);
            } else {
                Template::set('project', $data['project']);
                Template::render();
            }

        }

        //--------------------------------------------------------------------

        public function create()
        {
          if(!$this->auth->is_logged_in()) {
            Template::set_message('Please log in to post a project',  'error');
            redirect('login','location',301);

          }
           if ($this->input->post('submit'))
           {
                $usermeta = $this->user_model->find_meta_for($this->current_user->id);

               $data = array(
                   'title' => $this->input->post('title'),
                   'body'  => $this->input->post('body'),
                   'hours'  => $this->input->post('hours'),
                   'type'  => $this->input->post('type'),
                   'audience'  => $this->input->post('audience'),
                   'budget'  => $this->input->post('budget'),
                   'message'  => $this->input->post('message'),
                   'deliverables'  => $this->input->post('deliverables'),
                   'deadlines'  => $this->input->post('deadlines'),
                   'goals'  => $this->input->post('goals'),
                   'created_by' => $this->current_user->id
               );

               if ($this->projects_model->insert($data))
               {
                   Template::set_message('You post was successfully saved.', 'success');
                   redirect(base_url() .'projects');
               } 
           } 

           Template::render();
        }

    }