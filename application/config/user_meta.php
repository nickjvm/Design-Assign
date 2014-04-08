<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2013, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

//------------------------------------------------------------------------
// User Meta Fields Config - These are just examples of various options
// The following examples show how to use regular inputs, select boxes,
// state and country select boxes.
//------------------------------------------------------------------------

$config['user_meta_fields'] =  array(
	array(
		'name'=>'first_name',
		'label'=>'First Name',
		'rules'=>'trim|required',
		'form_detail'=>array(
			'type'=>"input",
			'settings'=>array(
				'id'=>'first_name',
				'name'=>'first_name',
				'maxlength'=>'100',
				'class'=>'span10'
				)
			)
		),	
	array(
		'name'=>'last_name',
		'label'=>'Last Name',
		'rules'=>'trim|required',
		'form_detail'=>array(
			'type'=>"input",
			'settings'=>array(
				'id'=>'last_name',
				'name'=>'last_name',
				'maxlength'=>'100',
				'class'=>'span10'
				)
			)
		),
	array(
		'name'=>'phone',
		'label'=>'Phone Number',
		'rules'=>'trim|required',
		'form_detail'=>array(
			'type'=>"input",
			'settings'=>array(
				'id'=>'phone',
				'name'=>'phone',
				'maxlength'=>'15',
				'class'=>'span6'
				)
			)
		),
	array(
		'name'   => 'category',
		'label' => 'I am a...',
		'rules'   => 'trim|required',
		'register_only'=>TRUE,
		'form_detail' => array(
			'type' => 'radio',
			'settings' => array(
				'name'	=> 'category'
				),
			'options' => array(
				array(
					'value' => "non-profit",
					'settings' => array(
						'id'		=> 'nonprofit',
						'class'		=> '',
						'label'		=> 'Non-profit organization'
					)
				),
				array(
					'value' => "creative",
					'settings' => array(
						'id'		=> 'creative',
						'class'		=> '',
						'label'		=> 'Creative volunteer'
					)
				)
			)			
		)
	),
	array(
		'label' =>	'Organization Name',
		'rules'	=>	'trim',
		'name'	=> 'organization',
		'wrapper_class'=>'nonprofit extra',
		'form_detail'	=> array(
			'type'=>'input',
			'settings' => array(
				'name'		=> 'organization',
				'id'		=> 'organization',
				'maxlength'	=> '100',
				'class'		=> 'span10'
			)
		)
	),

	array(
		'name'=>'website',
		'label'=>'Website',
		'rules'=>'trim|prep_url|xss_clean',
		'form_detail'=>array(
			'type'=>"input",
			'settings'=>array(
				'id'=>'website',
				'name'=>'website',
				'class'=>'span6'
				)
			)
		),
	array(
		'name'=>'skills',
		'label'=>'My Skillset Includes...',
		'rules'=>'trim|xss_clean',
		'helptext'=>'List any skills you find relevent. For example: Graphic Design, Web Development, Photography, Social Media...',
		'wrapper_class'=>'designer extra',
		'form_detail'=>array(
			'type'=>"textarea",
			'settings'=>array(
				'id'=>'skills',
				'name'=>'skills',
				'class'=>'span12'
				)
			)
		),
	array(
		'name'=>'501_status',
		'label'=>"501(c)3 Status",
		'rules'=>"",
		'wrapper_class'=>'nonprofit extra',
		'form_detail'=>array(
			'type'=>'checkbox',
			'settings'=>array(
				'name'=>'501_status'
				),
			'options'=>array(
				array(
					'value' => "501c3",
					'settings' => array(
						'id'		=> '501_status',
						'class'		=> '',
						'label'		=> 'My organization is a 501(c)3'
					)
				),
			)
		)
	),	
	array(
		'label' =>	'Street address',
		'rules'	=>	'trim|required',
		'name'	=> 'address',
		'form_detail'	=> array(
			'type'=>'input',
			'settings' => array(
				'name'		=> 'address',
				'id'		=> 'address',
				'maxlength'	=> '100',
				'class'		=> 'span10'
			)
		)
	),
	array(
		'label' =>	'City',
		'rules'	=>	'trim|required',
		'name'	=> 'city',
		'form_detail'	=> array(
			'type'=>'input',
			'settings' => array(
				'name'		=> 'city',
				'id'		=> 'city',
				'maxlength'	=> '100',
				'class'		=> 'span10'
			)
		)
	),
	array(
		'name'   => 'state',
		'label'   => lang('user_meta_state'),
		'rules'   => 'required|trim|max_length[100]',
		'admin_only' => FALSE,
		'form_detail' => array(
			'type' => 'state_select',
			'settings' => array(
				'name'		=> 'state',
				'id'		=> 'state',
				'maxlength'	=> '100',
				'class'		=> 'span4'
			),
		),
	),
	array(
		'label' =>	'Zip',
		'rules'	=>	'trim|required|alpha_dash|min_length[5]',
		'name'	=> 'zip',
		'form_detail'	=> array(
			'type'=>'input',
			'settings' => array(
				'name'		=> 'zip',
				'id'		=> 'zip',
				'maxlength'	=> '9',
				'class'		=> 'span2'
			)
		)
	)
/*	array(
		'name'   => 'category',
		'label'   => "",
		'rules'   => 'trim|required',
		'form_detail' => array(
			'value' => "asdf",
			'type' => 'radio',
			'settings' => array(
				'name'		=> 'category',
				'id'		=> 'bye',
				'maxlength'	=> '2',
				'class'		=> 'span1',
				'label'		=>"byee"
			),
		),
	),*/
/*
	array(
		'name'   => 'country',
		'label'   => lang('user_meta_country'),
		'rules'   => 'required|trim|max_length[100]',
		'admin_only' => FALSE,
		'form_detail' => array(
			'type' => 'country_select',
			'settings' => array(
				'name'		=> 'country',
				'id'		=> 'country',
				'maxlength'	=> '100',
				'class'		=> 'span10'
			),
		),
	)*/
);