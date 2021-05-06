<?php
use App\Http\Controllers\Admin\Menu;

return[
    'menu_detail' => [
        [
            'type' => 'item',
            'title' => '主控台',
            'func_name' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'permission' => 'admin area',
            'controller' => Menu\DashboardController::class,
        ],
        [
            'type' => 'header',
            'title' => '功能區塊',
            'func_name' => '',
            'icon' => '',
            'permission' => '',
            'controller' => '',
        ],
        [
            'type' => 'item',
            'title' => '功能項目',
            'func_name' => 'feature',
            'icon' => 'fas fa-brush',
            'permission' => 'admin feature',
            'controller' => Menu\FeaturesController::class,
            'children'=>[
                [
                    'type' => 'item',
                    'title' => '匯入匯出',
                    'func_name' => 'import-export',
                    'icon' => 'fas fa-file-excel',
                    'permission' => 'admin import export',
                    'controller' => Menu\ImportExportController::class,
                ],
            ],
        ],
        [
            'type' => 'header',
            'title' => '後台管理',
            'func_name' => '',
            'icon' => '',
            'permission' => '',
            'controller' => '',
        ],
        [
            'type' => 'item',
            'title' => '會員管理',
            'func_name' => 'user',
            'icon' => 'fas fa-user',
            'permission' => 'admin user',
            'controller' => Menu\UsersController::class,
        ],
        [
            'type' => 'item',
            'title' => '權限管理',
            'func_name' => 'permission',
            'icon' => 'fas fa-lock',
            'permission' => 'admin permission',
            'controller' => Menu\PermissionsController::class,
        ],
        [
            'type' => 'item',
            'title' => '網站資訊&設定',
            'func_name' => 'web-setting',
            'icon' => 'fas fa-cogs',
            'permission' => 'admin web setting',
            'controller' => Menu\WebSettingController::class,
            'children'=>[
                [
                    'type' => 'item',
                    'title' => '一般設定',
                    'func_name' => 'option',
                    'icon' => 'fas fa-key',
                    'permission' => 'admin option',
                    'controller' => Menu\OptionsController::class,
                ],
                [
                    'type' => 'item',
                    'title' => '路由列表',
                    'func_name' => 'route-list',
                    'icon' => 'fas fa-sitemap',
                    'permission' => 'admin route list',
                    'controller' => Menu\RouteListController::class,
                ],
                [
                    'type' => 'item',
                    'title' => '操作紀錄',
                    'func_name' => 'website-log-history',
                    'icon' => 'fas fa-history ',
                    'permission' => 'admin web log',
                    'controller' => Menu\WebLogController::class,
                ],
            ],
        ],
    ],
];
