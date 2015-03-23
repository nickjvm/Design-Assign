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
	public function index($filter='all')
	{
		$projects = $this->projects_model->find_all();

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
		$where = array();
		$where['deleted'] = 0;
		if (preg_match('{brief_id-([0-9]*)}', $filter, $matches))
		{
			$filter_type = 'brief_id';
			$brief_id = (int) $matches[1];
			$where['applicants.project_id'] = $brief_id;
			$records = $this->applicants_model->order_by("project_id","asc")->find_all_by($where);
		} else {
			$records = $this->applicants_model->order_by("project_id","asc")->find_all_by($where);
			$filter_type = 'all';
		}
		$records_with_applicants = array();

		if(is_array($records)) {
			foreach($records as $record) {
				$record->project = $this->projects_model->find($record->project_id);
				$record->organization = $this->user_model->find_user_and_meta($record->project->created_by)->organization;
				if(!in_array($record->project_id,$records_with_applicants)) {
					$records_with_applicants[] = $record->project_id;
				}
			}
		}

		if(is_array($projects)) {
			foreach($projects as $project) {
				if($this->applicants_model->project_has_applicants($project->brief_id)) {
					$project->has_applicants = true;
				} else {
					$project->has_applicants = false;
				}
				$project->organization = $this->user_model->find_user_and_meta($project->created_by)->organization;
			}
		}
		Template::set('records', $records);
		Template::set('records_with_applicants', $records_with_applicants);
		Template::set('projects', $projects);
		Template::set('toolbar_title', 'Manage Applicants');
		Template::set('index_url', site_url(SITE_AREA .'/content/applicants/') .'/');
		Template::set('filter_type', $filter_type);

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