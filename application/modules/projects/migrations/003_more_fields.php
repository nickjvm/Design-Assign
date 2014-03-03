<?php
class Migration_More_fields extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'budget' => array(
                "type"=>"VARCHAR(255)",
                'null'=>FALSE
                ),
            'audience' => array(
                "type"=>'VARCHAR(1028)',
                'null'=>FALSE
                ),
            'message' => array(
                "type"=>'VARCHAR(1028)',
                'null'=>FALSE
                ),
            'deliverables' => array(
                "type"=>'VARCHAR(1028)',
                'null'=>FALSE
                ),
            'deadlines' => array(
                "type"=>'VARCHAR(1028)',
                'null'=>FALSE
                ),
            'goals' => array(
                "type"=>'TEXT',
                'null'=>FALSE
                ),
            'approved' => array(
                "type"=>'TINYINT(1)',
                'null'=>FALSE,
                'default'=>0
                )
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();
        $fields = array(
            'budget',
            'audience',
            'message',
            'deliverables',
            'deadlines',
            'goals',
            'approved'
            );
        foreach($fields as $field) {
            $this->dbforge->drop_column("briefs",$field);
        }
    }

    //--------------------------------------------------------------------

}
