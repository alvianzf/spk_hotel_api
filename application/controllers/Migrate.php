<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class migrate extends CI_Controller 
{
    
    public function index()
    {
        // load migration library
        $this->load->library('migration');

        if ( ! $this->migration->current())
        {
            echo 'Error' . $this->migration->error_string();
        } else {
            echo 'Migrations ran successfully!';
        }   
    }    



    /**
     * Change migration version.
     * 
     * @access public
     * @param  str $version
     * @return void
     */
    public function v($version)
    {
        $this->load->library('migration');

        if (ENVIRONMENT == 'production') {
            $this->view = false;
            show_404();
        } else {
            $this->view = 'controllers/migrate/index.php';
    
            $this->data['result'] = $result = $this->migration->version($version);
    
            if ($result === false) {
                show_error($this->migration->error_string());
            }
        }
    }

   
    
     /**
     * Reset the migration.
     * 
     * @access public
     * @return void
     */
    public function reset()
    {
        $this->load->library('migration');

        if (ENVIRONMENT == "production") {
            $this->view = false;
            show_404();
        } else {
            // only left session table
            $this->v(20190301000001);
        }
    }
}