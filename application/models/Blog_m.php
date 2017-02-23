<?php

class Blog_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->db = $this->load->database('default', true);
    }

    public function insert($data, $table) {
        $this->db->insert($table, $data);
        return true;
    }

    public function edit_option_field($action, $id, $field, $table) {
        $this->db->where($field, $id);
        $this->db->update($table, $action);
        return true;
    }

    public function blogPostList() {
        $sql = "SELECT BlogId
                ,Title
                ,Details
                ,EntryDate
                ,Attachment
                FROM Blog";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function blogEdit($blogId) {
        $sql = "SELECT BlogId
                ,Title
                ,Details
                ,EntryDate
                ,Attachment
                ,Publish
                FROM Blog where BlogId = '$blogId'";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function blogDelete($blogId) {
        $sql = "DELETE FROM Blog WHERE BlogId=$blogId";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function delete_option($id,$field,$table) {
        $this->db->where($field, $id);
        $this->db->delete($table);
        return TRUE;
    }

}
