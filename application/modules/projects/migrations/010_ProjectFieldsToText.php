<?php
class Migration_ProjectFieldsToText extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'message' => array(
                'type' => 'TEXT',
            ),
            'deliverables' => array(
                'type' => 'TEXT',
            ),
            'deadlines' => array(
                'type' => 'TEXT',
            ),
            'goals' => array(
                'type' => 'TEXT',
            ),
        );

        $this->dbforge->modify_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $fields = array(
            'message' => array(
                'type' => 'varchar(1028)',
            ),
            'deliverables' => array(
                'type' => 'varchar(1028)',
            ),
            'deadlines' => array(
                'type' => 'varchar(1028)',
            ),
            'goals' => array(
                'type' => 'varchar(1028)',
            ),
        );
        $this->dbforge->modify_column("briefs",$fields);
    }

    //--------------------------------------------------------------------

}
