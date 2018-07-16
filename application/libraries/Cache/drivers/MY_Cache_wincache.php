<?php

class MY_Cache_wincache extends CI_Cache_wincache
{
    public function getKeys()
    {
        $cacheInfo = $this->cache_info();
        return $cacheInfo ? array_column($cacheInfo['ucache_entries'], 'key_name') : [];
    }

}
