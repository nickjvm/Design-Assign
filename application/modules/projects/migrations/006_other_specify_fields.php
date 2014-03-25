<?php
class Migration_Other_specify_fields extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'type_specify' => array(
                "type"=>"varchar(255)",
                'null'=>true
                ),
            'budget_specify' => array(
                "type"=>"varchar(255)",
                'null'=>true
                ),
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("briefs","type_specify");
        $this->dbforge->drop_column("briefs","budget_specify");
    }

    //--------------------------------------------------------------------

}
