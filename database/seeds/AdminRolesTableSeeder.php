<?php

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'updated_at' => '2020-12-02 14:50:00',
            ),
            1 => 
            array (
                'created_at' => '2020-12-11 10:14:38',
                'id' => 3,
                'name' => 'Seller',
                'slug' => '加盟商',
                'updated_at' => '2020-12-11 10:14:55',
            ),
        ));
        
        
    }
}