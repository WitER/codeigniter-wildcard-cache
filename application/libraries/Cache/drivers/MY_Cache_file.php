<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_file extends CI_Cache_file
{
    /**
     * Get all cache keys
     * @return array
     */
    public function getKeys()
    {
        $keys = $this->cache_info();
        if ( ! $keys) {
            return [];
        }
        $keys = array_keys($keys);
        return $keys;
    }
}
