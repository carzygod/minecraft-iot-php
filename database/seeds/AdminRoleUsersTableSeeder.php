<?php

use Illuminate\Database\Seeder;

class AdminRoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_users')->delete();
        
        \DB::table('admin_role_users')->insert(array (
            0 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'role_id' => 1,
                'updated_at' => '2020-12-02 14:50:00',
                'user_id' => 1,
            ),
        ));
        
        
    }
}