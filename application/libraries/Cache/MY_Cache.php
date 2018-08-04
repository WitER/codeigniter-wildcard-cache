<?php

/**
 * Class MY_Cache
 *
 * Extended Cache class for deleting cache by simple wildcards
 *
 * @author WitER<dimka.witer@gmail.com>
 */
class MY_Cache extends CI_Cache
{

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }


    /**
     * Delete cache by key or wildcard
     * @param string $id
     * @return int|bool
     */
    public function delete($id)
    {
        if (strpos($id, '*') !== false) {
            $id = str_replace('*', '', $id);
            return $this->deleteByWildCard($id);
        }
        return parent::delete($id);
    }

    /**
     * Get all cache keys
     * @return array
     */
    public function getKeys()
    {
        $keys = $this->{$this->_adapter}->getKeys();
        $keys = array_map(function ($key) {
            return str_replace($this->key_prefix, '', $key);
        }, $keys);
        return $keys;
    }

    /**
     * Get all cache keys with meta-data
     * @return array
     */
    public function getKeysMeta()
    {
        $result = [];
        foreach ($this->getKeys() as $key) {
            $result[$key] = $this->get_metadata($key);
        }
        return $result;
    }

    /**
     * Delete cache keys by wildcard, example: ->deleteByWildCard('*'), ->deleteByWildCard('my_cache_*')
     * @param string $id
     * @return int
     */
    public function deleteByWildCard($id)
    {
        $deleted = 0;
        foreach ($this->getKeys() as $key) {
            if (strpos($key, $id) === 0) {
                $this->delete($key);
                $deleted++;
            }
        }
        return $deleted;
    }



}
