<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_memcached extends CI_Cache_memcached
{
    /**
     * Get all cache keys
     * @return array
     */
    public function getKeys()
    {
        $keys= $this->_memcached->getAllKeys();
        return $keys ? $keys : [];
    }
}
