<?php
class Migration_Initial_tables extends Migration
{

    public function up()
    {
        $this->load->dbforge();

        $this->dbforge->add_field('page_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT');
        $this->dbforge->add_field('title VARCHAR(255) NOT NULL');
        $this->dbforge->add_field('slug VARCHAR(255) NOT NULL');
        $this->dbforge->add_field('body TEXT NULL');
        $this->dbforge->add_field('sidebar TEXT NULL');
        $this->dbforge->add_field('created_on DATETIME NOT NULL');
        $this->dbforge->add_field('modified_on DATETIME NULL');
        $this->dbforge->add_field('deleted TINYINT(1) NOT NULL DEFAULT 0');
        $this->dbforge->add_key('page_id', TRUE);

        $this->dbforge->create_table('pages');

        // Create the Permissions
        $this->load->model('permission_model');
        $this->permission_model->insert(array(
            'name'          => 'Bonfire.Pages.View',
            'description'   => 'To view the page menu.',
            'status'        => 'active'
        ));

        // Assign them to the admin role
        $this->load->model('role_permission_model');
        $this->role_permission_model->assign_to_role('Administrator', 'Bonfire.Pages.View');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->load->dbforge();

        $this->load->model('permission_model');

        $this->dbforge->drop_table('pages');
        $this->permission_model->delete_by_name('Bonfire.Pages.View');
    }

    //--------------------------------------------------------------------

}
