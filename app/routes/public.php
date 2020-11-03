<?php

// Public routes
Router::add('/', ['controller' => 'User/UserHomeController', 'action' => 'index']);

Router::add('/about', ['controller' => 'User/UserAboutController', 'action' => 'index']);

Router::add('/contact', ['controller' => 'User/UserContactController', 'action' => 'index']);

Router::add('/contact/check', ['controller' => 'User/UserContactController', 'action' => 'check']);

Router::add('/projects', ['controller' => 'User/UserProjectsController', 'action' => 'index']);

// test...
Router::add('/projects/{:id}', ['controller' => 'User/UserProjectsController', 'action' => 'index']);

Router::add('/projects/detail/{:id}', ['controller' => 'User/UserProjectsController', 'action' => 'detail']);

Router::add('/projects/filter', ['controller' => 'User/UserProjectsController', 'action' => 'filter']);
