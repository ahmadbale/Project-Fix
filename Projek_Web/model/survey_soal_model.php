<?php 
class BankSoal{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct(){
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (no_urut, soal_jenis, soal_nama) VALUES (?, ?, ?)");
    
        // binding parameter ke query, "iss" berarti integer, string, string
        $query->bind_param('iss', $data['no_urut'], $data['soal_jenis'], $data['soal_nama']);
        
        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData(){
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where soal_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data){
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set  no_urut=? , soal_jenis= ?, soal_nama = ? where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('issi',  $data['no_urut'] ,$data['soal_jenis'], $data['soal_nama'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}