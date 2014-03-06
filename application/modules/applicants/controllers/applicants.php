<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * applicants controller
 */
class applicants extends Front_Controller
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

		$this->load->library('form_validation');
		$this->load->model('applicants_model', null, true);
		$this->load->model('projects/projects_model', null, true);
		$this->lang->load('applicants');
		

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
		$this->auth->restrict('Applicants.Content.View');
		$records = $this->applicants_model->find_all();

		Template::set('records', $records);
		Template::render();
	}


	//--------------------------------------------------------------------
	public function apply($project_id)
	{
		$this->auth->restrict('Applicants.Content.Create');
		$project = $this->projects_model->find($project_id);
		Template::set('project', $project);

		if(isset($_POST['submit'])) {
			if ($insert_id = $this->save_applicant(0,$project_id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('applicants_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'applicants');
				Template::set_view('thanks');
					/*die("not ajax");
					Template::set_message("Thank you for volunteering for this project. If you are selected
						for the project, we will notifiy you by May XXX. Please feel free to volunteer for another project.", 'success');
					redirect(site_url('projects/project/'.$project_id));*/
				
			}
			else
			{
				//Template::set_message("Unable to submit your application.",'error');
				//Template::render();
				//redirect(site_url('projects/project/'.$project_id));
			}
		}
		Template::render();
	}

	private function save_applicant($id=0,$project_id)
	{
		// make sure we only pass in the fields we want
		if(!$this->is_valid_applicant($project_id)) {
			return false;
		}
		$data = array();
		$data['user_id']        = $this->current_user->id;
		$data['project_id']        = $project_id;

		$id = $this->applicants_model->insert($data);

		if (is_numeric($id))
		{
			$return = $id;
		}
		else
		{
			$return = FALSE;
		}


		return $return;
	}


	private function is_valid_applicant($project_id) {

		$search = array(
			"project_id"=>$project_id,
			"user_id"=>$this->current_user->id
			);



		$applications = $this->applicants_model->find_by($search);

		if($applications) {
			return false;
		}

		return true;
	}

}