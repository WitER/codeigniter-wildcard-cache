# codeigniter-wildcard-cache
Extended Codeigniter 3.x Cache drivers for delete cache by wildcard

* Deleting by wildcard `$this->cache->delete('my_cache_*);` or `$this->cache->deleteByWildCard('my_cache_');` - removed from cache all items where key beginning from `my_cache_`
* Getting all keys in store `$this->cache->getKeys();`
* Getting all keys in store with meta-data `$this->cache->getKeysMeta();`