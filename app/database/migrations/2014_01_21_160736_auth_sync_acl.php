<?php

use Orchestra\Model\Role;
use Illuminate\Database\Migrations\Migration;

class AuthSyncAcl extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Get our ACL
        $acl = App::make('acl');

        //Attach available actions
        $acl->actions()->attach([
            'manage foobar',
            'view foobar',
        ]);

        //Get available roles
        $admin = Role::admin();
        $member = Role::member();

        //Attach roles
        $acl->roles()->attach([$admin->name, $member->name]);

        //Set ACL metric for administrator
        $acl->allow($admin->name, [
            'manage foobar',
            'view foobar',
        ]);

        //Set ACL metric for member
        $acl->allow($member->name, [
            'view foobar'
        ]);
        
        //Need to manually trigger Orchestra\Memory finish method
        Memory::finish();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Memory::forget('acl_legoland');
    }

}