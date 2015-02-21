<?php
class Migration_AudienceText extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'audience' => array(
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
            'audience' => array(
                'type' => 'varchar(1028)',
            ),
        );

        $this->dbforge->modify_column("briefs",$fields);
    }

    //--------------------------------------------------------------------

}
