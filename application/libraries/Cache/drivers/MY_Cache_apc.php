<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_apc extends CI_Cache_apc
{
    public function getKeys()
    {
        $keys = apc_cache_info('user');
        if ( ! $keys) {
            return [];
        }
        $keys = array_column($keys['cache_list'], 'info');
        return $keys;
    }
}
