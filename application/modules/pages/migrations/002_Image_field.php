<?php
class Migration_Image_field extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'image' => array(
                "type"=>"VARCHAR(255)",
                'null'=>FALSE
                )
            );
        
        $this->dbforge->add_column('pages',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->dbforge->drop_column("pages","image");
    }

    //--------------------------------------------------------------------
}
