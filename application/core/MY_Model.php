<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model {

    var $limit = 20;

    function __construct()
    {
        parent::__construct();
    }

}