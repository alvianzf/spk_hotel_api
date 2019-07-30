<?php

require_once APPPATH . '/libraries/REST_Controller.php';

class Find extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        parent::__construct();

        $this->load->model('user_model');
    }

    public function hotel_post()
    {
        $jarak = $this->post('jarak');
        $fasilitas = $this->post('fasilitas');
        $harga     = $this->post('harga');

        return $this->response(['jarak' => $jarak, 'fasilitas' => $fasilitas, 'harga' => $harga], 200);
    }
}