<?php
class Migration_EmailSpecify extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'email_specify' => array(
                "type"=>'VARCHAR(255)',
                'null'=>TRUE
                )
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("briefs","email_specify");
    }

    //--------------------------------------------------------------------

}
