<?php
class Migration_hoursField extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'hours' => array(
                "type"=>"VARCHAR(10)",
                'null'=>true
                ),
            );
        $this->dbforge->add_column('briefs',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();
        $fields = array(
            'hours',
            );
        foreach($fields as $field) {
            $this->dbforge->drop_column("briefs",$field);
        }
    }

    //--------------------------------------------------------------------

}
