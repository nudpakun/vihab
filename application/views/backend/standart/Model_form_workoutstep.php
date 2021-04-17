<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_form_workoutstep extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'form_workoutstep';
    public $field_search   = ['workout_id', 'step_id', 'nose_x', 'right_eye_x', 'left_eye_x', 'right_ear_x', 'left_ear_x', 'right_shoulder_x', 'left_shoulder_x', 'right_elbow_x', 'left_elbow_x', 'right_wrist_x', 'left_wrist_x', 'right_hip_x', 'left_hip_x', 'right_knee_x', 'left_knee_x', 'right_ankle_x', 'left_ankle_x', 'nose_y', 'right_eye_y', 'left_eye_y', 'right_ear_y', 'left_ear_y', 'right_shoulder_y', 'left_shoulder_y', 'right_elbow_y', 'left_elbow_y', 'right_wrist_y', 'left_wrist_y', 'right_hip_y', 'left_hip_y', 'right_knee_y', 'left_knee_y', 'right_ankle_y', 'left_ankle_y', 'nose_check', 'eye_check', 'ear_check', 'shoulder_check', 'elbow_check', 'wrist_check', 'hip_check', 'knee_check', 'foot_check'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "form_workoutstep.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "form_workoutstep.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "form_workoutstep.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= "form_workoutstep.".$field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . "form_workoutstep.".$field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "form_workoutstep.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        
        $this->db->select('form_workoutstep.*');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_form_workoutstep.php */
/* Location: ./application/models/Model_form_workoutstep.php */