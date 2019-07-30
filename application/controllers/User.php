<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class user extends REST_Controller
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

    public function index_get()
    {

        $data = $this->user_model->get_all();

        return $this->response($data, 200);
    }

    public function user_post()
    {
        $email = $this->post('email');
        $username = $this->post('fullname');
        $password = $this->post('password');

        $post = [
            'email'     => $email,
            'username'  => $username,
            'password'  => $password
        ];

        $this->user_model->insert($post);

        return $this->response($post, 200);
    }

    public function login_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        $mail = $this->user_model->get_by('username', $username);

        if ($mail) {
            $pass = $mail->password;

            if ($password == $pass) {
                return $this->response(['login' => true], 200);
            } else {
                return $this->response(['login' => $email], 422);
            }
        } else {
            return $this->response(['login' => $email], 422);
        }

    }

    public function check_post()
    {

        $fullname = $this->post('fullname');
        $email    = $this->post('email');

        return $this->response(['fullname' => $fullname], REST_Controller::HTTP_OK);
    }
}