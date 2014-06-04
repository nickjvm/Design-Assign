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
            $applications_status = $this->settings_lib->item('ext.applications_status');

            $projects = $this->projects_model
              ->order_by("isClosed","asc")
              ->order_by('created_on', 'desc')
              ->where('deleted', 0)
              ->where('approved',1)
              ->find_all();
            foreach($projects as $project) {
              if($this->is_valid_applicant($project->brief_id)) {
                $project->valid = true;
              } else {
                $project->valid = false;
              }
            }                         
            Template::set('projects', $projects);
            Template::set("applications_status",$applications_status);

            Template::render();
        }

        //--------------------------------------------------------------------

        public function project($id,$action = null)
        {
            $this->load->helper('typography');
            $this->load->library('form_validation');
            $applications_status = $this->settings_lib->item('ext.applications_status');
            $project = $this->projects_model->order_by('created_on', 'asc')
                                      ->limit(1)
                                      ->find($id);

            if($action == "apply") {
              if(!$project->isClosed) {
                $this->apply($id,$this->current_user);
                return;
              } else {
                  Template::set_message('This project has already received many qualified candidates. We encourage you to apply for some of our other great opportunities.', 'info');
                  redirect(base_url() .'projects');
              }
            } 
            if($action == "share") {
                  $this->form_validation->set_rules('share_to', 'To', 'required');
                  $this->form_validation->set_rules('share_message', 'Message', 'required');

                if(!$this->input->post("submit") || $this->form_validation->run() == FALSE) {
                  Template::set("project",$project);
                  Template::set_view("share");
                  Template::render();
                } else {
                    $message = '';
                    $error = false;
                    $type = 'success';
                    $site_title = $this->settings_lib->item('site.title');
                    $error = false;
                    $default_message = '<p>'.site_url('projects/project/'.$id).'</p><p>---</p><p>Design Assign is a collaborative partnership that gives back to the greater Des Moines area community through design. Alongside AIGA Iowa, area creatives (like you!) use their talents to provide local non-profit organizations with communications products that can help raise awareness and funds.</p>';
                    $subject    =  str_replace('[SITE_TITLE]',$this->settings_lib->item('site.title'),lang('us_account_reg_complete'));
                    $email_mess   = $this->load->view('_emails/share', array(
                      'title'=>$site_title,
                      'link' => site_url(),
                      'body' => $this->input->post("share_message").$default_message
                      ), true);

                    $this->load->library('emailer/emailer');
                    $data = array(
                      'to'      => $this->input->post("share_to"),
                      'subject' => "Check out this Design Assign project!",
                      'message' => nl2br($email_mess),
                      'from'    =>array(
                        'name'    =>$this->current_user->meta->first_name.' '.$this->current_user->meta->last_name,
                        'email'   =>$this->current_user->email
                        )
                      );
                    if (!$this->emailer->send($data))
                    {
                      $message .= lang('us_err_no_email'). $this->emailer->error;
                      $error    = true;
                    }

                    if ($error)
                    {
                      $type = 'error';
                    }
                    else
                    {
                      $type = 'success';
                      log_activity($this->current_user->id, "Shared project via email", 'projects');
                    }
                    Template::set("applications_status",$applications_status);
                    Template::set("project",$project);
                    Template::set("email_sent",$this->input->post("share_to"));
                    Template::set_view("share");
                    Template::render();
                  }
                return;
            }                 
            if(!$this->is_valid_applicant($id)) {
              Template::set_message('You have already applied to volunteer for this project. We will contact you in June if you are a match.', 'info');

            }
              Template::set("applications_status",$applications_status);
              Template::set('valid_applicant',$this->is_valid_applicant($id));
              Template::set('project', $project);
              Template::render();

        }




        public function create()
        {
          $this->load->library('form_validation');

          if(!$this->auth->is_logged_in()) {
            $this->auth->restrict('Bonfire.ProjectBriefs.Apply',site_url('projects/create'),"Please log in to post a project");

          }
           if ($this->input->post('submit'))
           {
                $usermeta = $this->user_model->find_meta_for($this->current_user->id);

               $data = array(
                   'title' => $this->input->post('title'),
                   'body'  => $this->input->post('body'),
                   'hours'  => $this->input->post('hours'),
                   'type'  => $this->input->post('type'),
                   'type_specify'  => $this->input->post('type_specify'),
                   'audience'  => $this->input->post('audience'),
                   'budget'  => $this->input->post('budget'),
                   'budget_specify'  => $this->input->post('budget_specify'),
                   'message'  => $this->input->post('message'),
                   'deliverables'  => $this->input->post('deliverables'),
                   'deadlines'  => $this->input->post('deadlines'),
                   'goals'  => $this->input->post('goals'),
                   'created_by' => $this->current_user->id
               );

               if(strtolower($data['type']) == "other") {
                  $this->form_validation->set_rules('type_specify', 'Specific Project Type', 'required');
               }
               if(strtolower($data['budget']) == "other") {
                  $this->form_validation->set_rules('budget_specify', 'Estimated Budget', 'required');
               }
               if ($id = $this->projects_model->insert($data))
               {
                  $email_mess   = $this->load->view('_emails/project_submitted', array(
                    'id' => $id,
                    'author' => $usermeta->organization
                    ), true);
                  $this->load->library('emailer/emailer');
                  $data = array(
                    'to'    => 'designassign@aigaiowa.org',
                    'subject' => 'New project submitted for approval',
                    'message' => $email_mess,
                  );

                  $this->emailer->send($data);
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