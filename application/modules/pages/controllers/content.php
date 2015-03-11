<?php
class Content extends Admin_Controller
    {

    	public function __construct()
		{
		  parent::__construct();

		  $this->load->model('page_model');

		  Template::set('toolbar_title', 'Manage Your Pages');
		  Template::set_block('sub_nav', 'content/sub_nav');
		}

        //--------------------------------------------------------------------

        public function index()
        {

        	$pages = $this->page_model->where('deleted', 0)->find_all();

    	    Template::set('pages', $pages);
            Template::render();
        }

        //--------------------------------------------------------------------

        public function create()
		{
		   if ($this->input->post('submit'))
		   {
		       $data = array(
		           'title' => $this->input->post('title'),
		           'slug'  => $this->input->post('slug'),
		           'body'  => $this->input->post('body'),
		           'sidebar'  => $this->input->post('sidebar')
		       );
               $image = $this->input->post("image");
	               if(isset($image) && $image['size']) {
	       	        if($image = $this->upload_image("image")) {
	       		        $data['image'] = $image['file_name'];
	       		    }
	       		}
		       if ($this->page_model->insert($data))
		       {
		           Template::set_message('You page was successfully saved.', 'success');
		           redirect(SITE_AREA .'/content/pages');
		       }
		   }

		   Template::set('toolbar_title', 'Create New Page');
		   Template::set_view('content/post_form');
		   Template::render();
		}

		public function edit($id=null,$return = null)
		{
		    if ($this->input->post('submit'))
		    {
		        $data = array(
		            'title' => $this->input->post('title'),
		            'slug'  => $this->input->post('slug'),
		            'body'  => $this->input->post('body'),
		            'sidebar'  => $this->input->post('sidebar')
		        );
		        $image = $this->input->post("image");
		        if(isset($image) && $image['size']) {
			        if($image = $this->upload_image("image")) {
				        $data['image'] = $image['file_name'];
				    }
				}
		        if ($this->page_model->update($id, $data))
		        {
		            Template::set_message('You page was successfully saved.', 'success');
		            if($return) {
		            	redirect(base_url().$data['slug']);
		            } else {
			            redirect(SITE_AREA .'/content/pages');
			        }
		        }
		    }

		    Template::set('page', $this->page_model->find($id));

		    Template::set('toolbar_title', 'Edit Page');
		    Template::set_view('content/post_form');
		    Template::render();
		}

		public function upload_image($ajax = false)
			{
				$this->auth->restrict('Bonfire.Pages.View');

				$config['upload_path'] = "./assets/images/";
				$config['allowed_types'] = 'gif|jpg|png';
				//$config['max_size']	= '2048';
				//$config['max_width']  = '1600';
				//$config['max_height']  = '768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload("image"))
				{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					print_r($config);
					die();
				}
				else
				{

					$data = array('upload_data' => $this->upload->data());
					if(IS_AJAX) {
						echo json_encode($data['upload_data']);
					} else {
						return $data['upload_data'];
					}
				}
			}
		//--------------------------------------------------------------------
    }

    