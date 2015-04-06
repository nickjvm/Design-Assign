<?php
class Content extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('feature_model');
		Template::set_block('sub_nav', 'content/sub_nav');
		Template::set('toolbar_title', 'Manage Your Featured Items');
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
					$result = $this->feature_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. "feature projects deleted", 'success');
				}
				else
				{
					Template::set_message("Oops. Feature projects not deleted." . $this->feature_model->error, 'error');
				}
			}
		}

		$features = $this->feature_model->where('deleted', 0)->order_by("created_on","desc")->find_all();

		Template::set('features', $features);
		Template::render();
	}

        //--------------------------------------------------------------------


	public function create() {

		if ($this->input->post('submit')) {
			$data = array(
				'title' => $this->input->post('title'),
				'slug'  => $this->input->post('slug'),
				'body'  => $this->input->post('body'),
				'sidebar'  => $this->input->post('sidebar')
			);
			print $this->input->post("body");

			$image = $this->input->post("image");
			if(isset($image) && $image['size']) {
				if($image = $this->upload_image("image")) {
					$data['image'] = $image['file_name'];
				}
			}
			$slide = $this->input->post("slide");
			if(isset($slide) && $slide['size']) {
				if($slide = $this->upload_image("slide")) {
					$data['slide'] = $slide['file_name'];
				}
			}
			if(!$this->input->post("is_featured")) {
				$data['is_featured'] = 0;
			} else {
				$data['is_featured'] = 1;
			}

			if ($this->feature_model->insert($data))
			{
				Template::set_message('You item was successfully saved.', 'success');
				redirect(SITE_AREA .'/content/features');
			} else {
				Template::set_message($this->db->_error_message(), 'error');
			}
		}

		Template::set('toolbar_title', 'Create New Featured Project');
		Template::set_view('content/featured_form');
		Template::render();
	}

	public function edit($id=null) {
		if ($this->input->post('submit')) {
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
			$slide = $this->input->post("slide");
			if(isset($slide) && $slide['size']) {
				if($slide = $this->upload_image("slide")) {
					$data['slide'] = $slide['file_name'];
				}
			}
			if(!$this->input->post("is_featured")) {
				$data['is_featured'] = 0;
			} else {
				$data['is_featured'] = 1;
			}
			if ($this->feature_model->update($id, $data))
			{
				Template::set_message('You post was successfully saved.', 'success');
				redirect(SITE_AREA .'/content/features');
			}
		}

		Template::set('post', $this->feature_model->find($id));

		Template::set('toolbar_title', 'Edit Post');
		Template::set_view('content/featured_form');
		Template::render();
	}

	public function upload_image($name = "image", $ajax = false)
	{
		$this->auth->restrict('Bonfire.Pages.View');

		$config['upload_path'] = "./assets/images/features";
		$config['allowed_types'] = 'gif|jpg|png';
        		//$config['max_size']	= '2048';
        		//$config['max_width']  = '1600';
        		//$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($name))
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
