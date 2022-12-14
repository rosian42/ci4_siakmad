<?php
namespace App\Models;
use CodeIgniter\Model;
class KonfigurasiModel extends Model
{
	protected $table = "konfigurasi";
	protected $primaryKey = "id";
	protected $useSoftDeletes   = true;
	protected $allowedFields = ['konfigurasi_name', 'konfigurasi_value', 'konfigurasi_default', 'konfigurasi_group'];

	// Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

	// Untuk ambil data
	public function getData($parameter)
	{
		$builder = $this->table($this->table);
		$builder->where($parameter);
		$query = $builder->get();
		return $query->getRowArray();
	}


	// untuk update / simpan data
	public function updateData($data)
	{
		helper('global_helper');
		$builder = $this->table($this->table);
		foreach ($data as $key => $value) {
			$data[$key]=bersihkan_html($value);
		}
		if($builder->save($data)){
			return true;
		}else{
			return false;
		}
	}
}