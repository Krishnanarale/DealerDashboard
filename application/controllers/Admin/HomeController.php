<?php defined('BASEPATH') or exit('No direct script access allowed');
    class HomeController extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->isLoggedIn();
        }

        public function index() {
            $this->renderTemplate('dashboard');
        }
    }
?>