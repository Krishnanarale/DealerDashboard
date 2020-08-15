<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class DealerModel extends CI_Model {

        protected $table = 'dealers';
        protected $viewTable = 'vw_dealers';

        function __construct()
        {
            parent::__construct();
        }

        public function addDealer($data = null) {
            return $this->db->insert($this->table, $data);
        }
        
        public function getDealers($id = null, $limit = null, $offset = null) {
            if(!$id) {
                return $this->db->get($this->viewTable);
            }
            if($id && $limit) {
                return $this->db->get_where($this->viewTable, array('id' => $id), $limit, $offset);    
            }
            return $this->db->get_where($this->table, array('id' => $id), $limit, $offset);
        }
        
        public function updateDealer($data = null) {
            $this->db->where('id', $data['id']);
            array_splice($data,0,1);
            return $this->db->update($this->table, $data);
        }
        
        public function deleteDealer($id = null) {
            return $this->db->delete($this->table, array('id' => $id));
        }
    }
?>