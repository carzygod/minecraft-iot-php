<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'avatar' => NULL,
                'created_at' => NULL,
                'id' => 1,
                'name' => 'Administrator',
                'password' => '$2y$10$tkLhqLri3zB17zoYR2X8i.ntaqdK5XkJz0UChCmLPvyW3ehIY2l8G',
                'remember_token' => NULL,
                'updated_at' => NULL,
                'username' => 'carzygod',
            ),
        ));
        
        
    }
}