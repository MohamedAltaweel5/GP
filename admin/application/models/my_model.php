<?php
/**
 * Description of Article
 *
 * @author Gad
 */
class my_model extends CI_Model {
    
    public function get_all_data($table, $where=array(), $limit=NULL , $order_by=NULL , $order_type=NULL ,$id) {
        $this->db->where($where);
        if($limit)
            $this->db->limit($limit,$id);                   
        if($order_by)
            $this->db->order_by($order_by, $order_type);
        $query = $this->db->get($table);
        return $query->result_array();                        
    }
    public function numRows($tablename) {
        return $this->db->count_all_results($tablename);
    }
    public function get_one_row_by_id($idName,$id , $table) {
        $this->db->where($idName,$id);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    public function get_rows_by_column($column ,$value , $table) {
        $this->db->where($column , $value);
        $query = $this->db->get($table);        
        return $query->result_array();
    }
    function getTimeData($tablename , $column , $value) {        
        $query = $this->db->query('select * from '.$tablename.' where '.$column.' = '.$value.'');
        return $query->result_array();
    }
    public function insertData($table , $data) {
        if($this->db->insert($table,$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update($idName ,$id ,$table , $data) {
        $this->db->where($idName, $id);
        if($this->db->update($table, $data) == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function deleteFile($pathFile) {
        $ftpconfig['hostname'] = 'localhost';
        $ftpconfig['username'] = 'root';
        $ftpconfig['password'] = '';
        $ftpconfig['debug']        = TRUE;

        $this->ftp->connect($ftpconfig);
        if($this->ftp->delete_file($bathFile)){ return TRUE; }else{ return False; }
        $this->ftp->close();
    }
    public function delete_one_row_by_id($idName ,$id , $table) {        
        $this->db->where($idName, $id);
        if($this->db->delete($table)){
            return TRUE;
        }else{
            return FALSE;
        }                        
    }
    public function excuteQuery($query) {
        $func = $this->db->query($query);
        return $func->result_array();
    }
    public function query($sql) {
        //$this->db->query($sql);       
        $query = $this->db->query($sql);
        return $query->result_array();
    }           
}
