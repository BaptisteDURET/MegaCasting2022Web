<?php
namespace Deployer;

require 'recipe/common.php';

// Config

set('repository', 'git@github.com:BaptisteDURET/MegaCasting2022Web.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/app');

// Hooks

after('deploy:failed', 'deploy:unlock');
