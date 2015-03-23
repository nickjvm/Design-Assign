<?php
class Migration_deleted_tracking extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'deleted' => array(
                "type"=>"TINYINT(1)",
                'null'=>false,
                'default'=>0
                ),
                'modified_on' => array(
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

        $this->dbforge->drop_column("applicants","modified_on");
        $this->dbforge->drop_column("applicants","deleted");
    }

    //--------------------------------------------------------------------

}
