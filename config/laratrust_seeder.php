<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'offers' => 'c,r,u,d',
            'application' => 'c,r,u,d',
            'internship' => 'r,u'

        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'offers' => 'c,r,u,d',
            'profile' => 'r,u'

        ],
        'user' => [
            'offers' => 'r',
        ],
        'role_name' => [
            'module_1_name' => 'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
