<?php
class Migration_Created_on extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'created_on' => array(
                "type"=>"DATETIME",
                'null'=>false
                )
            );
        $this->dbforge->add_column('applicants',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("applicants","created_on");
    }

    //--------------------------------------------------------------------

}
