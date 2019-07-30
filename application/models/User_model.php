<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

class User_model extends MY_Model
{
    public $_table = 'users';

    public function __construct()
    {
        parent::__construct();
    }
    
}