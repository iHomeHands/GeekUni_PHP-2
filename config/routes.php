<?php

return array(
    // Product
    'product/([0-9]+)' => 'product/view/$1',
    // Admin

    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    'admin/category' => 'adminCategory/index',
    'admin/order' => 'adminOrder/index',
    'admin' => 'admin/index',
    // User
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    // Site
    'about' => 'site/about',
    'contacts' => 'site/contact',
    // Index
    '' => 'site/index'
);
