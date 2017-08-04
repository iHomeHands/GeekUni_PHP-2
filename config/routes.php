<?php

return array(
    // Product
    'product/([0-9]+)' => 'product/view/$1',
    // Admin
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
    'contact' => 'site/contact',
    // Index
    '' => 'site/index'
);
