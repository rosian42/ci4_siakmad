<?php

namespace App\Models;

use CodeIgniter\Model;

class CariModel extends Model
{
    protected $dt;
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    function getData($table, $where_field="", $where_val='', $groupBy='')
    {
        $builder = $this->db->table($table);
        if($where_val){
            $builder->where($where_field, $where_val);
        }
        if($groupBy){
            $builder->groupBy($groupBy);
        }
        $query = $builder->get();
        return $query->getResult();
    }

    function listData($table, $where="", $orderBy="", $groupBy="", $limit="")
    {
        //dd($where);
        $builder = $this->db->table($table);
        if($where){
            $builder->where($where);
        }
        if($groupBy){
            $builder->groupBy($groupBy);
        }
        if($orderBy){
            $builder->orderBy($orderBy);
        }
        if($limit){
            $builder->limit($limit);
        }
        $query = $builder->get();
        return $query->getResult();
    }

    function getDataAutoComplete($table, $field, $param, $groupBy='', $where='')
    {
        $builder = $this->db->table($table);
        if($where){
            $builder->where($where);
        }
        $query = $builder->like($field, $param, 'after')->groupBy($groupBy)->get();
        return $query->getResult();
    }
}
