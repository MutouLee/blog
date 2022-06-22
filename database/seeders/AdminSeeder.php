<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'id' => 1, 'parent_id' => 0, 'order' => 1, 'title' => 'Index', 'icon' => 'feather icon-bar-chart-2',
                'uri' => '/', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 2, 'parent_id' => 0, 'order' => 5, 'title' => 'Admin', 'icon' => 'feather icon-settings',
                'uri' => '', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 3, 'parent_id' => 2, 'order' => 6, 'title' => 'Users', 'icon' => '',
                'uri' => 'auth/users', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 4, 'parent_id' => 2, 'order' => 7, 'title' => 'Roles', 'icon' => '',
                'uri' => 'auth/roles', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 5, 'parent_id' => 2, 'order' => 8, 'title' => 'Permission', 'icon' => '',
                'uri' => 'auth/permissions', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 6, 'parent_id' => 2, 'order' => 9, 'title' => 'Menu', 'icon' => '',
                'uri' => 'auth/menu', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 7, 'parent_id' => 2, 'order' => 10, 'title' => 'Extensions', 'icon' => '',
                'uri' => 'auth/extensions', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 8, 'parent_id' => 0, 'order' => 3, 'title' => '栏目管理', 'icon' => 'fa-bars',
                'uri' => 'categories', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 9, 'parent_id' => 0, 'order' => 4, 'title' => '导航菜单', 'icon' => 'feather icon-navigation',
                'uri' => 'navigation', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 12, 'parent_id' => 0, 'order' => 2, 'title' => '文章列表', 'icon' => 'fa-file-text-o',
                'uri' => 'articles', 'extension' => '', 'show' => 1, 'created_at' => now(), 'updated_at' => now()
            ]
        ];
        DB::table('admin_menu')->insert($menus);


        $admin_permissions = [
            [
                'id' => 1, 'name' => 'Auth management', 'slug' => 'auth-management', 'http_method' => '', 'http_path' => '',
                'order' => 1, 'parent_id' => 0, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 2, 'name' => 'Users', 'slug' => 'users', 'http_method' => '', 'http_path' => '/auth/users*',
                'order' => 2, 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 3, 'name' => 'Roles', 'slug' => 'roles', 'http_method' => '', 'http_path' => '/auth/roles*',
                'order' => 3, 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 4, 'name' => 'Permissions', 'slug' => 'permissions', 'http_method' => '', 'http_path' => '/auth/permissions*',
                'order' => 4, 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 5, 'name' => 'Menu', 'slug' => 'menu', 'http_method' => '', 'http_path' => '/auth/menu*',
                'order' => 5, 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 6, 'name' => 'Extension', 'slug' => 'extension', 'http_method' => '', 'http_path' => '/auth/extensions*',
                'order' => 6, 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now()
            ],
        ];
        DB::table('admin_permissions')->insert($admin_permissions);


        $admin_role_users = [
            'role_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('admin_role_users')->insert($admin_role_users);


        $admin_roles = [
            'id' => 1,
            'name' => 'Administrator',
            'slug' => 'administrator',
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('admin_roles')->insert($admin_roles);


        $admin_users = [
            'id' => 1,
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Administrator',
            'avatar' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('admin_users')->insert($admin_users);


        $navigation = [
            'id' => 1,
            'parent_id' => 0,
            'order' => 1,
            'title' => '首页',
            'icon' => 'icon-aniukefu2',
            'uri' => '/',
            'show' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('navigation')->insert($navigation);

    }
}
