<?php

// --------------------
// APi public Routes
// --------------------

// Projects
Router::add('/api/projects', ['controller' => 'Api/ApiProjectsController', 'action' => 'projects']);
Router::add('/api/projects/{:id}', ['controller' => 'Api/ApiProjectsController', 'action' => 'projects']);

// Categories
Router::add('/api/categories', ['controller' => 'Api/ApiProjectsController', 'action' => 'categories']);
Router::add('/api/categories/{:id}', ['controller' => 'Api/ApiProjectsController', 'action' => 'categories']);

// Users
Router::add('/api/users', ['controller' => 'Api/ApiProjectsController', 'action' => 'users']);
Router::add('/api/users/{:id}', ['controller' => 'Api/ApiProjectsController', 'action' => 'users']);
