<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Cache_dummy extends CI_Cache_dummy
{
    public function getKeys()
    {
        return [];
    }
}
