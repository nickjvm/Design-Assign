<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2013, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Extended Settings Fields Config
 * The following examples show how to use regular inputs, select boxes,
 * state and country select boxes.
 * Note: the name field is limited to 26 characters
 */
$config['extended_settings_fields'] = array(
	array(
		'name'	=> 'extended_settings_test',
		'label'	=> 'Test Label',
		'rules'	=> 'trim',
		'form_detail'	=> array(
			'type'	=> 'dropdown',
			'settings'	=> array(
				'name'	=> 'extended_settings_test',
				'id'	=> 'extended_settings_test',
			),
			'options'	=> array(
				'0'	=> 'Passed',
				'1'	=> 'Failed',
			),
		),
		'permission' => 'This.Shouldnt.ShowUp',
	),
	array(
		'name'   => 'applications_status',
		'label'   => 'Creative Applications Status',
		'rules'   => '',
		'form_detail' => array(
			'type' => 'checkbox',
			'value'		=> 1,
			'label'=> "Open",
			'settings' => array(
				'name'		=> 'applications_status',
				'id'		=> 'applications_status',
			),
		),
		'permission' => 'Site.Settings.View',
	),
	array(
		'name'   => 'np_applications_status',
		'label'   => 'Non-Profit Applications Status',
		'rules'   => '',
		'form_detail' => array(
			'type' => 'checkbox',
			'value'		=> 1,
			'label'=> "Open",
			'settings' => array(
				'name'		=> 'np_applications_status',
				'id'		=> 'np_applications_status',
			),
		),
		'permission' => 'Site.Settings.View',
	),
	array(
		'name'   => 'np_application_start_date',
		'label'   => 'Non-Profit Applications Start Date',
		'rules'   => '',
		'form_detail' => array(
			'type' => 'input',
			'value'		=> "",
			'settings' => array(
				'name'		=> 'np_application_start_date',
				'id'		=> 'np_application_start_date',
				'placeholder'=>'MM/DD/YYYY'
			),
		),
		'permission' => 'Site.Settings.View',

	),
	array(
		'name'   => 'cr_application_start_date',
		'label'   => 'Creatives Applications Start Date',
		'rules'   => '',
		'form_detail' => array(
			'type' => 'input',
			'value'		=> "",
			'settings' => array(
				'name'		=> 'cr_application_start_date',
				'id'		=> 'cr_application_start_date',
				'placeholder'=>'MM/DD/YYYY'
			),
		),
		'permission' => 'Site.Settings.View',

	),
	/*array(
		'name'   => 'state',
		'label'   => lang('user_meta_state'),
		'rules'   => 'required|trim|max_length[2]',
		'form_detail' => array(
			'type' => 'state_select',
			'settings' => array(
				'name'		=> 'state',
				'id'		=> 'state',
				'maxlength'	=> '2',
				'class'		=> 'span1'
			),
		),
		'permission' => 'Site.Content.View',
	),
	array(
		'name'   => 'country',
		'label'   => lang('user_meta_country'),
		'rules'   => 'required|trim|max_length[100]',
		'form_detail' => array(
			'type' => 'country_select',
			'settings' => array(
				'name'		=> 'country',
				'id'		=> 'country',
				'maxlength'	=> '100',
				'class'		=> 'span6'
			),
		),
	),
	array(
		'name'   => 'type',
		'label'   => lang('user_meta_type'),
		'rules'   => 'required',
		'form_detail' => array(
			'type' => 'dropdown',
			'settings' => array(
				'name'		=> 'type',
				'id'		=> 'type',
				'class'		=> 'span6',
			),
			'options' =>  array(
				'small'  => 'Small Shirt',
				'med'    => 'Medium Shirt',
				'large'   => 'Large Shirt',
				'xlarge' => 'Extra Large Shirt',
			  ),
		),
	),*/
);
