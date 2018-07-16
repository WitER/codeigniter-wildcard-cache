<?php

class MY_Cache extends CI_Cache
{

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }


    public function delete($id)
    {
        if (strpos($id, '*') !== false) {
            $id = str_replace('*', '', $id);
            return $this->deleteByWildCard($this->key_prefix . $id);
        }
        return parent::delete($id);
    }

    public function getKeys()
    {
        $keys = $this->{$this->_adapter}->getKeys();
        $keys = array_map(function ($key) {
            return str_replace($this->key_prefix, '', $key);
        }, $keys);
        return $keys;
    }

    public function getKeysMeta()
    {
        $result = [];
        foreach ($this->getKeys() as $key) {
            $result[$key] = $this->get_metadata($key);
        }
        return $result;
    }

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