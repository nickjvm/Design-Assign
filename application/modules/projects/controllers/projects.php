<?php

class Projects extends Front_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper("form");
            $this->load->model('projects_model');
            $this->load->model('applicants/applicants_model');
        }

        //--------------------------------------------------------------------

        public function index()
        {
            $this->load->helper(array('typography','text'));

            $projects = $this->projects_model->order_by('created_on', 'desc')->where('deleted', 0)->where('approved',1)
                                      ->find_all();
            foreach($projects as $project) {
              if($this->is_valid_applicant($project->brief_id)) {
                $project->valid = true;
              } else {
                $project->valid = false;
              }
            }                         
            Template::set('projects', $projects);

            Template::render();
        }

        //--------------------------------------------------------------------

        public function project($id,$action = null)
        {
            $this->load->helper('typography');

            $project = $this->projects_model->order_by('created_on', 'asc')
                                      ->limit(1)
                                      ->find($id);
            if($action == "apply") {
                $this->apply($id,$this->current_user);
            }                         
            if(!$this->is_valid_applicant($id)) {
              Template::set_message('You have already applied to volunteer on this project. We will contact you by May XXX if you are a match.', 'info');

            }
              Template::set('valid_applicant',$this->is_valid_applicant($id));
              Template::set('project', $project);
              Template::render();

        }




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
                   Template::set_message('You post was successfully submitted for approval. Once approved, it will appear in the list below.', 'success');
                   redirect(base_url() .'projects');
               } 
           } 

           Template::render();
        }

        private function is_valid_applicant($project_id) {
          if(!$this->current_user) {
            return true;
          }
          $search = array(
            "project_id"=>$project_id,
            "user_id"=>$this->current_user->id
            );



          $applications = $this->projects_model->select("id")
                                              ->where($search)
                                              ->find_all_applicants();

          if($applications) {
            return false;
          }

          return true;
        }

    }