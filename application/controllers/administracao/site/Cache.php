<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cache extends CI_Controller {

    public function index()
    {
        // Deletes cache for the currently requested URI
        $this->output->delete_cache();
    }

}

/* End of file Cache.php */
/* Location: ./application/controllers/administracao/Cache.php */