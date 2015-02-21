<?php

    class Projects_model extends MY_Model
    {

        protected $table_name   = 'briefs';
        protected $key          = 'brief_id';
        protected $set_created  = true;
        protected $set_modified = true;
        protected $soft_deletes = true;
        protected $date_format  = 'datetime';

        //---------------------------------------------------------------
        protected $validation_rules = array(
          array(
              'field' => 'title',
              'label' => 'Project Type',
              'rules' => 'required|trim|strip_tags|xss_clean'
          )
        );

        protected $insert_validation_rules = array(
           
           'body'  => 'required',

           array(
               'field' => 'type',
               'label' => 'Project Type',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),array(
               'field' => 'budget',
               'label' => 'Project Budget',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),
           array(
               'field' => 'audience',
               'label' => 'Audience',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),
           array(
               'field' => 'message',
               'label' => 'Message',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),
           array(
               'field' => 'deliverables',
               'label' => 'Final product/deliverable',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),
           array(
               'field' => 'deadlines',
               'label' => 'Known Deadlines',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),
           array(
               'field' => 'goals',
               'label' => 'Goals of project',
               'rules' => 'required|trim|strip_tags|xss_clean'
           ),
           array(
               'field' => 'disclaimer',
               'label' => 'Dislaimer Acceptance',
               'rules' => 'required|trim|strip_tags|xss_clean'
           )
           
       );

        public function find_all_applicants()
          {
              $this->db->join("applicants","applicants.project_id = briefs.brief_id");
              return parent::find_all();
          }

       
    }