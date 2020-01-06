<?php

return [
    'dashboard' => [
        'view' => 'pages.dashboard.',

        'prefix' => 'dashboard',

        'page_title' => 'Dashboard List',
    ],
    'role' => [
        'dt_header' => [
            'id' => '#',
            'name' => 'Name',
            'guard_name' => 'Guard Name',
            'action_id' => 'Action',
        ],

        'view' => 'pages.role.',

        'prefix' => 'role',

        'page_title' => 'Role List',

        'page_create' => 'Add Role',

        'page_edit' => 'Update Role',
    ],
    'user' => [
        'dt_header' => [
            'id' => '#',
            'name' => 'Name',
            'email' => 'Email',
            'action_id' => 'Action',
        ],

        'view' => 'pages.user.',

        'prefix' => 'user',

        'page_title' => 'User List',

        'page_create' => 'Add User',

        'page_edit' => 'Update User',
    ],

    'expense' => [
        'dt_header' => [
            'id' => '#',
            'name' => 'Expense Category Name',
            'entry_date' => 'entry_date',
            'amount' => 'amount',
            'action_id' => 'Action',
        ],

        'view' => 'pages.expense.',

        'prefix' => 'expense',

        'page_title' => 'Expense List',

        'page_create' => 'Add Expense',

        'page_edit' => 'Update Expense',
    ],
    'category' => [
        'dt_header' => [
            'id' => '#',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created at',
            'action_id' => 'Action',
        ],

        'view' => 'pages.category.',

        'prefix' => 'category',

        'page_title' => 'Category List',

        'page_create' => 'Add Category',

        'page_edit' => 'Update Category',
    ],
];
