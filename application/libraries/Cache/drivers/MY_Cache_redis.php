<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_redis extends CI_Cache_redis
{
    /**
     * Get all cache keys
     * @return array
     */
    public function getKeys()
    {
        $keys = $this->_redis->keys('*');
        return $keys ? $keys : [];
    }
}
