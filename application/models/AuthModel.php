<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class AuthModel extends CI_Model {

        protected $table = 'users';

        function __construct()
        {
            parent::__construct();
        }

        public function getUser($email = null, $limit = null, $offset = null) {
            return $this->db->get_where($this->table, ['email' => $email ], $limit, $offset);
        }

    }
?>