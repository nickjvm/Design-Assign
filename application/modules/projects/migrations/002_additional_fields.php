<?php
class Migration_Additional_fields extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'created_by' => array(
                "type"=>"INT",
                'null'=>FALSE
                ),
            'hours' => array(
                "type"=>'VARCHAR(255)',
                'null'=>FALSE
                )
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("briefs","created_by");
        $this->dbforge->drop_column("briefs","hours");
    }

    //--------------------------------------------------------------------

}
