<?php
class Migration_content_blob extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $fields = array(
            'body' => array(
                'type' => 'LONGBLOB',
            ),
            'sidebar' => array(
                'type' => 'LONGBLOB',
            )
        );

        $this->dbforge->modify_column('pages',$fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $fields = array(
            'body' => array(
                'type' => 'TEXT',
            ),
            'sidebar' => array(
                'type' => 'TEXT',
            )
        );
        $this->dbforge->modify_column("pages",$fields);
    }

    //--------------------------------------------------------------------

}
