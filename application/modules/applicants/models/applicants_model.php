<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Applicants_model extends BF_Model {

	protected $table_name	= "applicants";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";

	protected $log_user 	= FALSE;

	protected $set_created	= TRUE;
	protected $set_modified = true;

	/*
		Customize the operations of the model without recreating the insert, update,
		etc methods by adding the method names to act as callbacks here.
	 */
	protected $before_insert 	= array();
	protected $after_insert 	= array();
	protected $before_update 	= array();
	protected $after_update 	= array();
	protected $before_find 		= array();
	protected $after_find 		= array();
	protected $before_delete 	= array();
	protected $after_delete 	= array();

	/*
		For performance reasons, you may require your model to NOT return the
		id of the last inserted row as it is a bit of a slow method. This is
		primarily helpful when running big loops over data.
	 */
	protected $return_insert_id 	= TRUE;

	// The default type of element data is returned as.
	protected $return_type 			= "object";

	// Items that are always removed from data arrays prior to
	// any inserts or updates.
	protected $protected_attributes = array();

	/*
		You may need to move certain rules (like required) into the
		$insert_validation_rules array and out of the standard validation array.
		That way it is only required during inserts, not updates which may only
		be updating a portion of the data.
	 */
	protected $validation_rules 		= array(
		array(
			"field"		=> "applicants_user_id",
			"label"		=> "User Id",
			"rules"		=> "required|max_length[30]"
		),
		array(
			"field"		=> "applicants_project_id",
			"label"		=> "Project ID",
			"rules"		=> "required|max_length[30]"
		),
	);
	protected $insert_validation_rules 	= array(
		"disclaimer"=>'required');
	protected $skip_validation 			= FALSE;

	//--------------------------------------------------------------------


	public function find_project()
	{
	  $this->db->join("briefs","applicants.project_id = briefs.brief_id");
	  return parent::find_by();
	}


	public function project_has_applicants($project_id) {
		$where = array();
		$where['applicants.project_id'] = $project_id;
		$results = $this->find_all_by($where);
		if($results) {
			return count($results);
		} else {
			return false;
		}
	}

}
