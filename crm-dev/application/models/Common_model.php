<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model
{	
	function delete_data($tableName,$param)
	{
		
		$this->db->where($param);
		$this->db->delete($tableName);
	}
	function update_data($tableName,$where,$data)
	{
		$this->db->where($where);
		$this->db->update($tableName, $data);
	}
	function insert_user($data)
	{
		$this->db->insert('users', $data); 
	}
	
	function insertData($tableName,$data)
	{

		$this->db->insert($tableName, $data); 
	}
	function getData($tableName, $where,$order)
	{
		 $this->db->select('*');
		 $this->db->from($tableName);
		 $this->db->where($where);
		 $this->db->order_by($order, "desc");
		 $query = $this->db->get();
		 return $query->result();
	}
	
	function numrows($tablename,$where)
	{
		$this->db->select('*');
		 $this->db->from($tablename);
		 $this->db->where($where);
		 $query = $this->db->get();
		 return $query->num_rows();
	}

	function numrowsProposal($tablename,$where,$fname)
	{
		$this->db->select('*');
		 $this->db->from($tablename);
		 $this->db->where($where);
		 if($fname != ''){
			$this->db->like('first_name', $fname); 
			$this->db->or_like('last_name', $fname);
		 }
		 $query = $this->db->get();
		 return $query->num_rows();
	}

	function numrowsDbQuery($sql)
	{

		$query = $this->db->query($sql);
		 return $query->num_rows();

	}

	function dataUpdate($tablename,$where,$data)
	{
		$this->db->where($where);
		$this->db->update($tablename, $data);

	}
	
	function dataUpdateWithoutWhere($tablename,$data)
	{
		//$this->db->where($where);
		$this->db->update($tablename, $data);

	}


	function getValue($tableName, $field_name, $where){

		$query = $this->db->get_where($tableName, $where);

		$row = $query->row_array();

		if(!empty($row)){
			return $row[$field_name];
		}
		else{
			return '';
		}

		

	}
	function getAllData($tableName, $where)
	{
		 $this->db->select('*');
		 $this->db->from($tableName);
		 $this->db->where($where);
		
		 $query = $this->db->get();
		 return $query->result();
	}

	function getDatawithlimit($tableName, $where,$order,$start,$end)
	{
		 $this->db->select('*');
		 $this->db->from($tableName);
		 if($where != ''){
		 	$this->db->where($where);
		 }
		 
		 $this->db->order_by($order, "desc");
		 $this->db->limit($end,$start);
		 $query = $this->db->get();
		 return $query->result();
	}
	function get_Datawithlimit($tableName, $where,$order,$start,$end,$group_by)
	{
		 $this->db->select('*');
		 $this->db->from($tableName);
		 if($where != ''){
		 	$this->db->where($where);
		 }
		 $this->db->group_by($group_by);  
		 $this->db->order_by($order, "desc");
		 $this->db->limit($end,$start);
		 $query = $this->db->get();
		 return $query->result();
	}
	
	function getAllDataOrder($tableName, $where,$order_filed,$order)
	{
		 $this->db->select('*');
		 $this->db->from($tableName);
		 if($where != ''){
		 	 $this->db->where($where);
		 }
		
		 $this->db->order_by($order_filed, $order);
		 $query = $this->db->get();
		 return $query->result();
	}

	

	function getSingle($table,$where_clause) {

		$this->db->where($where_clause);
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();  
		return $query->row(); 

	}


	function getSingleArray($table,$where_clause) {

		$this->db->where($where_clause);
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();  
		return $query->row_array(); 

	}
	
	function average($table,$where,$field)
	{
		$this->db->select_avg($field);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->row();
	}
	
	function getValueIn($table,$field,$ids)
	{

		$this->db->select('*');
		$this->db->from($table);
		$this->db->where_in($field, $ids);
		//$this->db->order_by("id", "desc");
		$query = $this->db->get();

		 return $query->result();
	}
	

	function getValueInOrder($table,$field,$ids,$fieldOrder,$order)
	{

		$this->db->select('*');
		$this->db->from($table);
		$this->db->where_in($field, $ids);
		$this->db->order_by($fieldOrder, $order);
		$query = $this->db->get();

		 return $query->result();
	}




		function getDataWhere($tableName, $param){

		$query = $this->db->get_where($tableName, $param);

		return $query->result();

	}
	
	function getValueall($tableName)
	{
		$query = $this->db->get($tableName);


	
		return $query->result();
		
	}
	function delete_data_in($tableName,$param,$where)
	{
		$this->db->where($where);
		$this->db->where_not_in('id',$param);
		$this->db->delete($tableName);
	}


	function delete_data_not_in($tableName,$param,$where,$field)
	{
		$this->db->where($where);

		$this->db->where_not_in($field, $param);

		//$this->db->where_not_in('id',$param);
		$this->db->delete($tableName);
	}
	
		function maxid($table,$field)
		{
			$this->db->select_max($field);
			$query = $this->db->get($table);
			return $query->row(); //$query->result();
		}

		function dbQuery($query)
		{
			$query = $this->db->query($query);
			return $query->result();

		}
		function dbQueryUpdate($query)
		{
			$query = $this->db->query($query);
			

		}

		
		public function fetch_paginationData($table,$where,$limit, $start) {
			$this->db->limit($limit, $start);
			if(!empty($where)){
				$this->db->where($where);
			}
			$this->db->order_by('id','desc');
			$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		
		public function fetch_paginationDataSearch($table,$where,$limit, $start,$fname) {
			$this->db->limit($limit, $start);
			if(!empty($where)){
				$this->db->where($where);
			}
			if($fname != ''){
				$this->db->like('first_name', $fname); 
				$this->db->or_like('last_name', $fname);
			}
			$this->db->order_by('id','desc');
			$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
		}
		function dbQuerynumrows($query)
		{
			$query = $this->db->query($query);
			return $query->num_rows();
		}


}
?>