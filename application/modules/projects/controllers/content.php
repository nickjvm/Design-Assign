<?php
class Content extends Admin_Controller
    {

    	public function __construct()
		{
		  parent::__construct();

		  $this->load->model('projects_model');

		  Template::set('toolbar_title', 'Manage Project Briefs');
		  Template::set_block('sub_nav', 'content/sub_nav');
		}

        //--------------------------------------------------------------------

        public function index()
        {

        	if (isset($_POST['delete']))
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$result = $this->projects_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. "projects deleted", 'success');
					}
					else
					{
						Template::set_message("Unable to delete projects". $this->projects_model->error, 'error');
					}
				}
			}
        	if (isset($_POST['approve']))
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$this->projects_model->skip_validation(true);
						$project = $this->projects_model->find($pid);
						if(!$project->approved) {
							$result = $this->projects_model->update($pid,array('approved'=>1));
						}
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. "projects approved", 'success');
					}
					else
					{
						Template::set_message("Unable to approve projects". $this->projects_model->error, 'error');
					}
				}
			}
        	$briefs = $this->projects_model->where('deleted', 0)->order_by('created_on',"asc")->find_all();
        	if($briefs) { 
	        	foreach($briefs as $brief) {
	        		$brief->organization = $this->user_model->find_user_and_meta($brief->created_by)->organization;
	        	}
	        }
    	    Template::set('briefs', $briefs);
            Template::render();
        }

        //--------------------------------------------------------------------

        public function create()
		{
		   if ($this->input->post('submit'))
		   {
				$this->projects_model->skip_validation(true);
		       $data = array(
                   'title' => $this->input->post('title'),
                   'body'  => $this->input->post('body'),
                   'type'  => $this->input->post('type'),
                   'type_specify'  => $this->input->post('type_specify'),
                   'hours'  => $this->input->post('hours'),
				   'email_specify'  => $this->input->post('email_specify'),
                   'audience'  => $this->input->post('audience'),
                   'budget'  => $this->input->post('budget'),
                   'budget_specify'  => $this->input->post('budget_specify'),
                   'message'  => $this->input->post('message'),
                   'deliverables'  => $this->input->post('deliverables'),
                   'deadlines'  => $this->input->post('deadlines'),
                   'goals'  => $this->input->post('goals'),
                   'created_by' => $this->current_user->id
               );
		       if ($this->projects_model->insert($data))
		       {
		           Template::set_message('You post was successfully saved.', 'success');
		           redirect(SITE_AREA .'/content/projects');
		       }
		   }

		   Template::set('toolbar_title', 'Create New Post');
		   Template::set_view('content/post_form');
		   Template::render();
		}

		public function edit_brief($id=null)
		{
		    if ($this->input->post('submit'))
		    {
		        $data = array(
                   'title' => $this->input->post('title'),
                   'body'  => $this->input->post('body'),
                   'type'  => $this->input->post('type'),
                   'type_specify'  => $this->input->post('type_specify'),
                   'hours'  => $this->input->post('hours'),
                   'email_specify'  => $this->input->post('email_specify'),
                   'audience'  => $this->input->post('audience'),
                   'budget'  => $this->input->post('budget'),
                   'budget_specify'  => $this->input->post('budget_specify'),
                   'message'  => $this->input->post('message'),
                   'deliverables'  => $this->input->post('deliverables'),
                   'deadlines'  => $this->input->post('deadlines'),
                   'goals'  => $this->input->post('goals')
               );
		        if($this->input->post("approved")) {
		        	$data['approved'] = 1;
		        } else {
		        	$data['approved'] = 0;
		        }
		        if($this->input->post("isClosed")) {
		        	$data['isClosed'] = 1;
		        } else {
		        	$data['isClosed'] = 0;
		        }

		        if ($this->projects_model->update($id, $data))
		        {
		            Template::set_message('You post was successfully saved.', 'success');
		            redirect(SITE_AREA .'/content/projects');
		        }
		    }

		    Template::set('post', $this->projects_model->find($id));

		    Template::set('toolbar_title', 'Edit Project');
		    Template::set_view('content/post_form');
		    Template::render();
		}
    }