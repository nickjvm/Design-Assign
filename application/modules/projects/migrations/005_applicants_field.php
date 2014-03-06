<?php
class Migration_Applicants_field extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'applicants' => array(
                "type"=>"TEXT",
                'null'=>true
                )
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("briefs","applicants");
    }

    //--------------------------------------------------------------------

}
