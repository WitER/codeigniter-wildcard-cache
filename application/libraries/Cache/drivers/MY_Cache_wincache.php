<?php

class MY_Cache_wincache extends CI_Cache_wincache
{
    public function getKeys()
    {
        $cacheInfo = $this->cache_info();
        return array_column($cacheInfo['ucache_entries'], 'key_name');
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
