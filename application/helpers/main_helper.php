<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

function assets_url($uri='')
{
    return base_url("assets/{$uri}");
}