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
            return $this->{$this->_adapter}->deleteByWildCard($this->key_prefix . $id);
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

    public function getKeysInfo()
    {
        $keys = $this->{$this->_adapter}->getKeysInfo();
        $tmp = [];
        foreach ($keys as $key => $info) {
            $tmp[str_replace($this->key_prefix, '', $key)] = $info;
        }
        return $tmp;
    }

}