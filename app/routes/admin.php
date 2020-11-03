<?php

// Admin main route
Router::add('/admin', ['controller' => 'Admin/AdminHomeController', 'action' => 'index']);

// Login
Router::add('/admin/login', ['controller' => 'Admin/AdminLoginController', 'action' => 'index']);
Router::add('/admin/login/check', ['controller' => 'Admin/AdminLoginController', 'action' => 'check']);
Router::add('/admin/logout', ['controller' => 'Admin/AdminLoginController', 'action' => 'logout']);

// AdminCategories
Router::add('/admin/categories', ['controller' => 'Admin/AdminCategoriesController', 'action' => 'index']);
Router::add('/admin/categories/add', ['controller' => 'Admin/AdminCategoriesController', 'action' => 'add']);
Router::add('/admin/categories/edit/{:id}', ['controller' => 'Admin/AdminCategoriesController', 'action' => 'edit']);
Router::add('/admin/categories/delete/{:id}', ['controller' => 'Admin/AdminCategoriesController', 'action' => 'delete']);

// AdminProjects
Router::add('/admin/projects', ['controller' => 'Admin/AdminProjectsController', 'action' => 'index']);
Router::add('/admin/projects/add', ['controller' => 'Admin/AdminProjectsController', 'action' => 'add']);
Router::add('/admin/projects/edit/{:id}', ['controller' => 'Admin/AdminProjectsController', 'action' => 'edit']);
Router::add('/admin/projects/delete/{:id}', ['controller' => 'Admin/AdminProjectsController', 'action' => 'delete']);

// AdminUsers
Router::add('/admin/users', ['controller' => 'Admin/AdminUsersController', 'action' => 'index']);
Router::add('/admin/users/add', ['controller' => 'Admin/AdminUsersController', 'action' => 'add']);
Router::add('/admin/users/edit/{:id}', ['controller' => 'Admin/AdminUsersController', 'action' => 'edit']);
Router::add('/admin/users/delete/{:id}', ['controller' => 'Admin/AdminUsersController', 'action' => 'delete']);

// Admin demo routes
Router::add('/admin/demo', ['controller' => 'Admin/AdminDemoController', 'action' => 'index']);
Router::add('/admin/demo/add', ['controller' => 'Admin/AdminDemoController', 'action' => 'add']);
Router::add('/admin/demo/edit/{:id}', ['controller' => 'Admin/AdminDemoController', 'action' => 'edit']);
Router::add('/admin/demo/delete/{:id}', ['controller' => 'Admin/AdminDemoController', 'action' => 'delete']);
Router::add('/admin/demo/deleteImg/{:id}', ['controller' => 'Admin/AdminDemoController', 'action' => 'deleteImg']);
