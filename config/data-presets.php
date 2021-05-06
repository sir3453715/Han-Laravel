<?php

return[

    // 角色
    'roles' => [
        ['name' => 'administrator', 'displayName' => '最高權限管理員'],
        ['name' => 'manager' , 'displayName' => '商店管理員'],
        ['name' => 'customer' , 'displayName' => '顧客'],
    ],

    'permissions'=>[
        [
            //進入後台
            'name'         => 'admin area',
            'displayName'  => 'adminArea',
            'assignTo'     => ['manager'],
        ],
        [
            //功能項目
            'name'         => 'admin feature',
            'displayName'  => 'adminFeature',
            'assignTo'     => ['manager'],
        ],
        [
            //匯入匯出
            'name'         => 'admin import export',
            'displayName'  => 'adminImportExport',
            'assignTo'     => ['manager'],
        ],
        [
            //會員管理
            'name'         => 'admin user',
            'displayName'  => 'adminUser',
            'assignTo'     => ['manager'],
        ],
        [
            //權限管理
            'name'         => 'admin permission',
            'displayName'  => 'adminPermission',
            'assignTo'     => [],
        ],
        [
            //網站設定
            'name'         => 'admin web setting',
            'displayName'  => 'adminWebSetting',
            'assignTo'     => ['manager'],
        ],
        [
            //一般設定
            'name'         => 'admin option',
            'displayName'  => 'adminOption',
            'assignTo'     => ['manager'],
        ],
        [
            //路由列表
            'name'         => 'admin route list',
            'displayName'  => 'adminRouteList',
            'assignTo'     => [],
        ],
        [
            //網站歷史紀錄
            'name'         => 'admin web log',
            'displayName'  => 'adminWebLog',
            'assignTo'     => ['manager'],
        ],
    ],
    // 預設的設定值
    'options' => [
        'site_name' => config('app.name'),
    ],
];
