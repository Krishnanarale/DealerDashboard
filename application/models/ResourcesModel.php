<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResourcesModel extends CI_Model {

    protected $cities = 'cities';
    protected $tehsils = 'tehsils';

	function __construct()
    {
        parent::__construct();
    }

    public function getDistricts($state_id = null, $limit = null, $offset = null) {
        return $this->db->get_where($this->cities, ['state_id' => $state_id ], $limit, $offset);
    }
    
    public function getTehsils($city_id = null, $limit = null, $offset = null) {
        if(!$city_id) {
            return $this->db->get($this->tehsils);
        }
        return $this->db->get_where($this->tehsils, ['city_id' => $city_id ], $limit, $offset);
    }
}
?>