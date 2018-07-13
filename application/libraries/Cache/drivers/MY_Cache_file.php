<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_file extends CI_Cache_file
{
    public function getKeys()
    {
        $keys = array_keys($this->cache_info());
        return $keys;
    }

    public function deleteByWildCard($id)
    {
        $deleted = 0;
        foreach ($this->getKeys() as $key) {
            if (strpos($key, $id) !== false) {
                $this->delete($key);
                $deleted++;
            }
        }
        return $deleted;
    }

    public function getKeysInfo()
    {
        $result = [];
        foreach ($this->getKeys() as $key) {
            $result[$key] = $this->get_metadata($key);
        }
        return $result;
    }
}
