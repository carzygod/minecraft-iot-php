<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
                

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => 'feather icon-bar-chart-2',
                'id' => 1,
                'order' => 1,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Index',
                'updated_at' => NULL,
                'uri' => '/',
            ),
            1 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => 'feather icon-settings',
                'id' => 2,
                'order' => 2,
                'parent_id' => 0,
                'show' => 1,
                'title' => 'Admin',
                'updated_at' => '2020-12-02 16:02:40',
                'uri' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => '',
                'id' => 3,
                'order' => 3,
                'parent_id' => 2,
                'show' => 1,
                'title' => 'Users',
                'updated_at' => NULL,
                'uri' => 'auth/users',
            ),
            3 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => '',
                'id' => 4,
                'order' => 4,
                'parent_id' => 2,
                'show' => 1,
                'title' => 'Roles',
                'updated_at' => NULL,
                'uri' => 'auth/roles',
            ),
            4 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => '',
                'id' => 5,
                'order' => 5,
                'parent_id' => 2,
                'show' => 1,
                'title' => 'Permission',
                'updated_at' => NULL,
                'uri' => 'auth/permissions',
            ),
            5 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => '',
                'id' => 6,
                'order' => 6,
                'parent_id' => 2,
                'show' => 1,
                'title' => 'Menu',
                'updated_at' => NULL,
                'uri' => 'auth/menu',
            ),
            6 => 
            array (
                'created_at' => '2020-12-02 14:50:00',
                'extension' => '',
                'icon' => '',
                'id' => 7,
                'order' => 7,
                'parent_id' => 2,
                'show' => 1,
                'title' => 'Extensions',
                'updated_at' => NULL,
                'uri' => 'auth/extensions',
            ),
            7 => 
            array (
                'created_at' => '2020-12-04 15:12:25',
                'extension' => '',
                'icon' => 'fa-address-card',
                'id' => 8,
                'order' => 8,
                'parent_id' => 0,
                'show' => 1,
                'title' => '用户系统',
                'updated_at' => '2020-12-09 12:33:45',
                'uri' => NULL,
            ),
            8 => 
            array (
                'created_at' => '2020-12-09 12:34:28',
                'extension' => '',
                'icon' => 'fa-address-book',
                'id' => 11,
                'order' => 11,
                'parent_id' => 8,
                'show' => 1,
                'title' => '用户列表',
                'updated_at' => '2020-12-09 12:34:28',
                'uri' => '/user',
            ),
            9 => 
            array (
                'created_at' => '2020-12-09 12:36:05',
                'extension' => '',
                'icon' => 'fa-address-card-o',
                'id' => 12,
                'order' => 12,
                'parent_id' => 8,
                'show' => 1,
                'title' => '权限列表',
                'updated_at' => '2020-12-09 12:36:05',
                'uri' => '/role',
            ),
            10 => 
            array (
                'created_at' => '2020-12-11 15:00:33',
                'extension' => '',
                'icon' => 'fa-500px',
                'id' => 13,
                'order' => 13,
                'parent_id' => 8,
                'show' => 1,
                'title' => '加盟商列表',
                'updated_at' => '2020-12-11 15:00:33',
                'uri' => '/admin/user',
            ),
            11 => 
            array (
                'created_at' => '2020-12-11 15:01:07',
                'extension' => '',
                'icon' => 'fa-address-book-o',
                'id' => 14,
                'order' => 14,
                'parent_id' => 8,
                'show' => 1,
                'title' => '分销人员',
                'updated_at' => '2020-12-11 15:01:07',
                'uri' => '/user',
            ),
            12 => 
            array (
                'created_at' => '2020-12-11 15:01:51',
                'extension' => '',
                'icon' => 'fa-anchor',
                'id' => 15,
                'order' => 15,
                'parent_id' => 0,
                'show' => 1,
                'title' => '商城信息',
                'updated_at' => '2020-12-11 15:18:40',
                'uri' => NULL,
            ),
            13 => 
            array (
                'created_at' => '2020-12-11 15:19:03',
                'extension' => '',
                'icon' => 'fa-amazon',
                'id' => 16,
                'order' => 16,
                'parent_id' => 15,
                'show' => 1,
                'title' => '商城列表',
                'updated_at' => '2020-12-11 15:19:03',
                'uri' => NULL,
            ),
            14 => 
            array (
                'created_at' => '2020-12-11 15:22:47',
                'extension' => '',
                'icon' => 'fa-gift',
                'id' => 17,
                'order' => 17,
                'parent_id' => 0,
                'show' => 1,
                'title' => '商品信息',
                'updated_at' => '2020-12-11 15:23:34',
                'uri' => NULL,
            ),
            15 => 
            array (
                'created_at' => '2020-12-11 15:27:14',
                'extension' => '',
                'icon' => 'fa-bars',
                'id' => 18,
                'order' => 18,
                'parent_id' => 17,
                'show' => 1,
                'title' => '商城分类',
                'updated_at' => '2020-12-11 15:27:14',
                'uri' => NULL,
            ),
            16 => 
            array (
                'created_at' => '2020-12-11 15:27:42',
                'extension' => '',
                'icon' => 'fa-amazon',
                'id' => 19,
                'order' => 19,
                'parent_id' => 17,
                'show' => 1,
                'title' => '商品列表',
                'updated_at' => '2020-12-11 15:27:42',
                'uri' => NULL,
            ),
            17 => 
            array (
                'created_at' => '2020-12-11 15:28:45',
                'extension' => '',
                'icon' => 'fa-eyedropper',
                'id' => 20,
                'order' => 20,
                'parent_id' => 15,
                'show' => 1,
                'title' => '广告位管理',
                'updated_at' => '2020-12-11 15:28:45',
                'uri' => NULL,
            ),
            18 => 
            array (
                'created_at' => '2020-12-11 15:29:46',
                'extension' => '',
                'icon' => 'fa-institution',
                'id' => 21,
                'order' => 21,
                'parent_id' => 15,
                'show' => 1,
                'title' => '活动管理',
                'updated_at' => '2020-12-11 15:29:46',
                'uri' => NULL,
            ),
        ));

        //
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
