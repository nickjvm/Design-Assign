<?php
class Migration_Additional_permissions extends Migration
{

    public function up()
    {
 

        // Create the Permissions
        $this->load->model('permission_model');
        $this->permission_model->insert(array(
            'name'          => 'Bonfire.ProjectBriefs.Create',
            'description'   => 'To create a project briefs.',
            'status'        => 'active'
        ));
        $this->permission_model->insert(array(
            'name'          => 'Bonfire.ProjectBriefs.Edit',
            'description'   => 'To edit an existing project briefs.',
            'status'        => 'active'
        ));
        $this->permission_model->insert(array(
            'name'          => 'Bonfire.ProjectBriefs.Apply',
            'description'   => 'To create apply to a project brief.',
            'status'        => 'active'
        ));

        // Assign them to the admin role
        $this->load->model('role_permission_model');
        $this->role_permission_model->assign_to_role('Administrator', 'Bonfire.ProjectBriefs.Create');
        $this->role_permission_model->assign_to_role('Administrator', 'Bonfire.ProjectBriefs.Edit');
        $this->role_permission_model->assign_to_role('Nonprofit', 'Bonfire.ProjectBriefs.Create');
        $this->role_permission_model->assign_to_role('Creative', 'Bonfire.ProjectBriefs.Apply');
    }

    //--------------------------------------------------------------------

    public function down()
    {

        $this->permission_model->delete_by_name('Bonfire.ProjectBriefs.Create');
        $this->permission_model->delete_by_name('Bonfire.ProjectBriefs.Edit');
        $this->permission_model->delete_by_name('Bonfire.ProjectBriefs.View');
        $this->permission_model->delete_by_name('Bonfire.ProjectBriefs.Apply');
        $this->permission_model->delete_by_name('Bonfire.ProjectBriefs.View');
    }

    //--------------------------------------------------------------------

}
