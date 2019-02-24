<?php

return [
    'default_route' => 'test.read',
    'roles_super_admin' => [1],
    'check_super_admin' => false,
    'abilities' => [
        'test' => ['create', 'read', 'edit', 'delete'],
//        'articles' => ['read', 'create', 'edit', 'delete'],
//        'galleries' => ['read', 'create', 'edit', 'delete'],
//        'news' => ['read', 'create', 'edit', 'delete'],
//        'settings' => ['read', 'edit', 'delete'],
//        'roles' => ['read', 'create', 'edit', 'delete'],
//        'sliders' => ['read', 'create', 'edit', 'delete'],
//        'user' => ['read', 'create', 'edit', 'delete'],
//        'modules' => ['edit'],
//        'crop' => ['read'],
    ]
];
