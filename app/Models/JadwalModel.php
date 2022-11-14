<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class JadwalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_jadwal';
    protected $primaryKey       = 'id_jadwal';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = ['tb_jadwal.id_jadwal'];
    protected $column_search = ['tb_mapel.nm_mapel'];
    protected $order = ['tb_jadwal.hari, tb_jadwal.jam' => 'asc'];
    protected $request;
    protected $db;
    protected $dt;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        //$db = \Config\Database::connect();
        $this->request = $request;
        $this->dt = $this->table($this->table);
    }

    private function getDatatablesQuery()
    {
        if($this->request->getVar('th_pelajaran'))
        {
            $this->dt->where('tb_jadwal.id_tahun_akademik', $this->request->getVar('th_pelajaran'));
        }
        if($this->request->getVar('semester'))
        {
            $this->dt->where('tb_jadwal.semester', $this->request->getVar('semester'));
        }
        if($this->request->getVar('id_tingkat'))
        {
            $this->dt->where('tb_jadwal.id_tingkat', $this->request->getVar('id_tingkat'));
        }
        if($this->request->getVar('kd_kelas'))
        {
            $this->dt->where('tb_jadwal.kd_kelas', $this->request->getVar('kd_kelas'));
        }
         $this->dt->where('tb_jadwal.deleted_at', null);
        $this->dt->select('tb_jadwal.id_jadwal, tb_jadwal.id_guru, tb_mapel.nm_mapel, tb_guru.nama_lengkap, tb_kelas.nm_kelas, tb_jadwal.hari, tb_jadwal.jam');
        $this->dt->join('tb_mapel','tb_mapel.id_mapel = tb_jadwal.id_mapel','left');
        $this->dt->join('tb_guru','tb_guru.id_guru = tb_jadwal.id_guru','left');
        $this->dt->join('tb_kelas','tb_kelas.kd_kelas = tb_jadwal.kd_kelas','left');

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getVar('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getVar('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getVar('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getVar('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getVar('order')['0']['column']], $this->request->getVar('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getVar('length') != -1)
            $this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

    public function generateJadwal()
    {
        $mapelKurikulum = $this->db->table('tb_kurikulum as k')
                            ->select('kd.id_mapel')
                            ->join('tb_kurikulum_detail as kd', 'kd.id_kurikulum=k.id_kurikulum','left')
                            ->getWhere(['k.is_aktif' => 'Y', 'kd.id_tingkat' => $this->request->getVar('id_tingkat')])->getResultArray();
        if($mapelKurikulum){
            foreach ($mapelKurikulum as $mapel) {
                $record = [
                        'id_tahun_akademik' => $this->request->getVar('th_pelajaran'),
                        'semester' => $this->request->getVar('semester'),
                        'id_tingkat' => $this->request->getVar('id_tingkat'),
                        'kd_kelas' => $this->request->getVar('kd_kelas'),
                        'id_mapel' => $mapel
                    ];
                $this->dt->set('id_jadwal', 'UUID()', false);
                $this->dt->save($record);
            }
            return true;
        }else{
            return false;
        }
    }

    //fungsi ambil data
    function getData($id)
    {
        $builder = $this->table($this->table);
        $builder->where($this->primaryKey, $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    function hapus($id)
    {
        $builder = $this->table($this->table);
        $builder->where($this->primaryKey, $id);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }

    function simpanJadwal($data)
    {
        $builder = $this->table($this->table);
        if (isset($data['id_jadwal'])) {
            if($builder->update($data['id_jadwal'], $data)){
                return true;
            }else{
                return false;
            }
        } else {
            $dataJadwal = $this->getData($data);
            $record = [
                    'id_tahun_akademik' => $dataJadwal['id_tahun_akademik'],
                    'semester' => $dataJadwal['semester'],
                    'id_tingkat' => $dataJadwal['id_tingkat'],
                    'kd_kelas' => $dataJadwal['kd_kelas'],
                    'id_guru' => $dataJadwal['id_guru'],
                    'id_mapel' => $dataJadwal['id_mapel']
                ];
            $builder->set('id_jadwal', 'UUID()', false);
            if($builder->save($record)){
                return true;
            }else{
                return false;
            };

        }
    }

    function cekJadwal()
    {
        
        //$builder = $this->table($this->table);
       $this->dt->where([
            'tb_jadwal.id_tahun_akademik' => $this->request->getVar('th_pelajaran'),
            'tb_jadwal.semester' => $this->request->getVar('semester'),
            'tb_jadwal.id_tingkat' => $this->request->getVar('id_tingkat'),
            'tb_jadwal.kd_kelas' => $this->request->getVar('kd_kelas')

        ]);
        $this->dt->where('tb_jadwal.deleted_at', null);
        $this->dt->select('tb_jadwal.id_jadwal, tb_jadwal.id_guru, tb_mapel.nm_mapel, tb_guru.nama_lengkap, tb_kelas.nm_kelas, tb_hari.opt_val as hari, tb_jam.opt_val as jam');
        $this->dt->join('tb_mapel','tb_mapel.id_mapel = tb_jadwal.id_mapel','left');
        $this->dt->join('tb_guru','tb_guru.id_guru = tb_jadwal.id_guru','left');
        $this->dt->join('tb_kelas','tb_kelas.kd_kelas = tb_jadwal.kd_kelas','left');
        $this->dt->join('tb_option as tb_hari','tb_hari.opt_id = tb_jadwal.hari AND tb_hari.opt_group="hari"','left');
        $this->dt->join('tb_option as tb_jam','tb_jam.opt_id = tb_jadwal.jam AND tb_jam.opt_group="jam_pelajaran"','left');
        $this->dt->orderBy('tb_jadwal.hari ASC, tb_jadwal.jam ASC');
        $query = $this->dt->get();
        return $query->getResult();
        
    }
}
