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

        	$briefs = $this->projects_model->where('deleted', 0)->find_all();

    	    Template::set('briefs', $briefs);
            Template::render();
        }

        //--------------------------------------------------------------------

        public function create()
		{
		   if ($this->input->post('submit'))
		   {
		       $data = array(
		           'title' => $this->input->post('title'),
		           'body'  => $this->input->post('body'),
		           'organization'  => $this->input->post('organization'),
		           'hours'  => $this->input->post('hours')
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
		            'organization'  => $this->input->post('organization'),
		            'hours'  => $this->input->post('hours')
		        );

		        if ($this->projects_model->update($id, $data))
		        {
		            Template::set_message('You post was successfully saved.', 'success');
		            redirect(SITE_AREA .'/content/projects');
		        }
		    }

		    Template::set('post', $this->projects_model->find($id));

		    Template::set('toolbar_title', 'Edit Post');
		    Template::set_view('content/post_form');
		    Template::render();
		}
    }