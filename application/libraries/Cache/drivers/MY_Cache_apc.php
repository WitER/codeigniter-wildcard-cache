<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_apc extends CI_Cache_apc
{
    public function delete($id)
    {
        return apc_delete($id);
    }

    public function getKeys()
    {
        $keys = apc_cache_info('user');
        $keys = array_column($keys['cache_list'], 'info');
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
