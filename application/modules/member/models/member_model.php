<?php
class Member_model extends CI_Model
{
	
# constructor	
	function __construct()
	{
        parent::__construct();
    }
	
	# hotel list
	public function get_hotel($member_id,$limit,$offset)
	{
		$where = "";
		if($member_id > 0): $where = " WHERE hot_mem_id = $member_id "; endif;
		$query = " 	SELECT * FROM hotel 
					$where
					ORDER BY hot_name ASC 
					LIMIT $limit,$offset
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	# room list
	public function get_room($hotel_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room 
					JOIN hotel_room_type ON hr_room_type = hrt_id
					JOIN hotel_room_capacity ON hr_room_capacity = hrc_id
					WHERE hr_hot_id = $hotel_id
					ORDER BY hr_room_type,hr_room_capacity
					LIMIT $limit,$offset	
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	# room type
	public function get_room_type($hotel_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room_type 
					WHERE hrt_hot_id = $hotel_id
					ORDER BY hrt_id 
					LIMIT $limit,$offset	
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	# room capacity
	public function get_room_capacity($hotel_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room_capacity 
					WHERE hrc_hot_id = $hotel_id
					ORDER BY hrc_id 
					LIMIT $limit,$offset	
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	# room price
	public function get_room_price($hotel_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room_price 
					WHERE hrp_hot_id = $hotel_id
					ORDER BY hrp_id 
					LIMIT $limit,$offset	
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	# room price
	public function get_room_no($room_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room_no 
					WHERE hrn_room_id = $room_id
					ORDER BY hrn_id 
					LIMIT $limit,$offset	
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	# room type_facilities
	public function get_room_type_facilities($room_type_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room_type_facilities 
					WHERE hrtf_room_type = $room_type_id
					ORDER BY hrtf_id 
					LIMIT $limit,$offset	
				";
		$query = $this->db->query($query);
		return $query->result();
	}
	
	
	
	# count hotel
	public function count_hotel($member_id)
	{
		$where = "";
		if($member_id > 0): $where .= " WHERE hot_mem_id = $member_id "; endif;
		$query = " 	SELECT * FROM hotel $where ";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	# count room 
	public function count_room($hotel_id)
	{
		$query = "	SELECT * FROM hotel_room 
					JOIN hotel_room_type ON hr_room_type = hrt_id
					JOIN hotel_room_capacity ON hr_room_capacity = hrc_id
					WHERE hr_hot_id = $hotel_id
				";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	# count room type
	public function count_room_type($hotel_id)
	{
		$query = "	SELECT * FROM hotel_room_type 
					WHERE hr_hot_id = $hotel_id
				";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	# count room capacity
	public function count_room_capacity($hotel_id)
	{
		$query = "	SELECT * FROM hotel_room_capacity 
					WHERE hrc_hot_id = $hotel_id
				";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	# count room price
	public function count_room_price($hotel_id)
	{
		$query = "	SELECT * FROM hotel_room_price 
					WHERE hrp_hot_id = $hotel_id
				";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	# count room no
	public function count_room_no($room_id)
	{
		$query = "	SELECT * FROM hotel_room_no
					WHERE hrn_room_id = $room_id
				";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	# count room type_facilities
	public function count_room_type_facilities($room_type_id,$limit,$offset)
	{
		$query = "	SELECT * FROM hotel_room_type_facilities 
					WHERE hrtf_room_type = $room_type_id
				";
		$query = $this->db->query($query);
		return $query->num_rows();
	}
	
}

?>