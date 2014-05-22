<?php
class Migration_Increase_username_length extends Migration
{

    public function up()
    {
        $fields = array(
            'username' => array(
                 'type' => 'VARCHAR(120)'
            )
        );
        $this->dbforge->modify_column('users', $fields);

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $fields = array(
            'username' => array(
                 'type' => 'VARCHAR(30)'
            )
        );
        $this->dbforge->modify_column('users', $fields);
    }

    //--------------------------------------------------------------------

}
