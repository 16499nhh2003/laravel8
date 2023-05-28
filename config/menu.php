<?php
    return [
        [
            'label' => 'Dashboard',
            'route' =>  'admin.dashboard', 
            'icon' =>  'fa-home'
        ],
        [
            'label' => 'Product Manager',
            'route' =>  'product.index', 
            'icon' =>  'fa fa-product-hunt',
            'items' => [
                [
                    'label' => 'All product',
                    'route' => 'product.index',
                ],
                [
                    'label' => 'Add product',
                    'route' => 'product.create',
                ],
            ] 
        ],
        [
            'label' => 'Category Manager',
            'route' =>  'category.index', 
            'icon' =>  'fa-list-alt',
            'items' => [
                [
                    'label' => 'All category',
                    'route' => 'category.index',
                ],
                [
                    'label' => 'Add category',
                    'route' => 'category.create',
                ],
            ] 
        ],
        [
            'label' => 'Blog Manager',
            'route' =>  'blog.index', 
            'icon' =>  'fa-solid fa-blog',
            'items' => [
                [
                    'label' => 'All blog',
                    'route' => 'blog.index',
                ],
                [
                    'label' => 'Add blog',
                    'route' => 'blog.create',
                ],
            ] 
        ],
        [
            'label' => 'Banner Manager',
            'route' =>  'banner.index', 
            'icon' =>  'fa-image',
            'items' => [
                [
                    'label' => 'All banner',
                    'route' => 'banner.index',
                ],
                [
                    'label' => 'Add banner',
                    'route' => 'banner.create',
                ],
            ] 
        ],
        [
            'label' => 'Order Manager',
            'route' =>  'order.index', 
            'icon' =>  'fa-solid fa-file-invoice',
            'items' => [
                [
                    'label' => 'All order',
                    'route' => 'order.index',
                ],
                [
                    'label' => 'Add order',
                    'route' => 'order.create',
                ],
            ] 
        ],
        [
            'label' => 'Account Manager',
            'route' =>  'account.index', 
            'icon' =>  'fa-sharp fa-solid fa-users',
            'items' => [
                [
                    'label' => 'All account',
                    'route' => 'account.index',
                ],
                [
                    'label' => 'Add account',
                    'route' => 'account.create',
                ],
            ] 
        ]
    ];
?>