<?php
class Migration_IsClosedBit extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'isClosed' => array(
                "type"=>"TINYINT(1)",
                'null'=>false,
                'default'=>0
                )
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("briefs","isClosed");
    }

    //--------------------------------------------------------------------

}
