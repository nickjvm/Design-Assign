<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * content controller
 */
class content extends Admin_Controller
{

	//--------------------------------------------------------------------


	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Applicants.Content.View');
		$this->load->model('applicants_model', null, true);
		$this->load->model('projects/projects_model');
		$this->lang->load('applicants');
		
		Template::set_block('sub_nav', 'content/_sub_nav');

		Assets::add_module_js('applicants', 'applicants.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->applicants_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('applicants_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('applicants_delete_failure') . $this->applicants_model->error, 'error');
				}
			}
		}

		$records = $this->applicants_model->find_all();
		if(is_array($records)) {
			foreach($records as $record) {
				$record->project = $this->projects_model->find($record->project_id);
				$record->organization = $this->user_model->find_user_and_meta($record->project->created_by)->organization;
			}
		}
		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Applicants');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Applicants object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Applicants.Content.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_applicants())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('applicants_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'applicants');

				Template::set_message(lang('applicants_create_success'), 'success');
				redirect(SITE_AREA .'/content/applicants');
			}
			else
			{
				Template::set_message(lang('applicants_create_failure') . $this->applicants_model->error, 'error');
			}
		}
		Assets::add_module_js('applicants', 'applicants.js');

		Template::set('toolbar_title', lang('applicants_create') . ' Applicants');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Applicants data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('applicants_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/applicants');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Applicants.Content.Edit');

			if ($this->save_applicants('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('applicants_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'applicants');

				Template::set_message(lang('applicants_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('applicants_edit_failure') . $this->applicants_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Applicants.Content.Delete');

			if ($this->applicants_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('applicants_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'applicants');

				Template::set_message(lang('applicants_delete_success'), 'success');

				redirect(SITE_AREA .'/content/applicants');
			}
			else
			{
				Template::set_message(lang('applicants_delete_failure') . $this->applicants_model->error, 'error');
			}
		}
		Template::set('applicants', $this->applicants_model->find($id));
		Template::set('projects', $this->projects_model->where("deleted",0)->find_all());
		Template::set('toolbar_title', lang('applicants_edit') .' Applicants');
		Template::render();
	}

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/**
	 * Summary
	 *
	 * @param String $type Either "insert" or "update"
	 * @param Int	 $id	The ID of the record to update, ignored on inserts
	 *
	 * @return Mixed    An INT id for successful inserts, TRUE for successful updates, else FALSE
	 */
	private function save_applicants($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['id'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('applicants_user_id');
		$data['project_id']        = $this->input->post('applicants_project_id');

		if ($type == 'insert')
		{
			$id = $this->applicants_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			}
			else
			{
				$return = FALSE;
			}
		}
		elseif ($type == 'update')
		{
			$return = $this->applicants_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}