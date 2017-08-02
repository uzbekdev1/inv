<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model
{

    //conts
    const ENT_NAME = 'inventories';

    //properties
    public $id;
    public $type_id;
    public $name;
    public $quantity;
    public $serial_number;
    public $location;
    public $size;
    public $status_id;
    public $date;
    public $user_id;

    //members
    public function paging_entities($limit, $offset)
    {
        $this->db->order_by('id', 'DESC');
        $rows = $this->db->get(SELF::ENT_NAME, $limit, $offset)->result();

        return $rows;
    }

    public function total_records()
    {
        $rows = $this->db->get(SELF::ENT_NAME);

        return $rows->num_rows();
    }

    public function insert_entity()
    {
        $this->user_id = $_SESSION["user_id"];
        $this->type_id = $_REQUEST["type_id"];
        $this->name = $_REQUEST["name"];
        $this->quantity = $_REQUEST["quantity"];
        $this->serial_number = $_REQUEST["serial_number"];
        $this->location = $_REQUEST["location"];
        $this->size = $_REQUEST["size"];
        $this->status_id = $_REQUEST["status_id"];
        $this->date = time();

        $this->db->insert(SELf::ENT_NAME, $this);
    }

    public function get_entity($id)
    {
        $this->db->where('id', $id);
        $rows = $this->db->get(SELF::ENT_NAME)->result();

        return $rows[0];
    }

    public function update_entity($id)
    {

        $this->user_id = $_SESSION["user_id"];
        $this->type_id = $_REQUEST["type_id"];
        $this->name = $_REQUEST["name"];
        $this->quantity = $_REQUEST["quantity"];
        $this->serial_number = $_REQUEST["serial_number"];
        $this->location = $_REQUEST["location"];
        $this->size = $_REQUEST["size"];
        $this->status_id = $_REQUEST["status_id"];
        $this->date = time();

        $this->db->where("id", $id);
        $this->db->update(SELF::ENT_NAME, $this);
    }

    public function delete_entity($id)
    {
        $this->db->where("id", $id);
        $this->db->delete(SELF::ENT_NAME);
    }

}