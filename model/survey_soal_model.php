<?php
class BankSoal{
    public $db;
    protected $table = 'm_survey_soal';
    protected $table_relation = 'm_survey';

    public function __construct($db){
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) VALUES (?, ?, ?, ?, ?)");

        $query->bind_param('iiiss', $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['soal_nama']);

        if($query->execute()){
          $query->close();
          return true;
        }
        return false;
    }

  public function getData(){
    $query = "  
    SELECT
    {$this->table}.survey_id,
    {$this->table}.kategori_id,
    {$this->table}.soal_jenis,
    {$this->table}.soal_nama,
    {$this->table}.soal_id,
    {$this->table}.no_urut,
    {$this->table_relation}.survey_jenis,
    m_kategori.kategori_nama
FROM
    {$this->table}
JOIN
    {$this->table_relation}
ON
    ({$this->table}.survey_id = {$this->table_relation}.survey_id)
JOIN
    m_kategori
ON
    ({$this->table}.kategori_id = m_kategori.kategori_id)
";
    $stmt = $this->db->prepare($query);

    if($stmt->execute()) {
      $result = $stmt->get_result();
      $stmt->close();
      return $result;
    }

    return false;
  }

  public function getDataBySurveyId($id)
  {
    $query = "
      SELECT * FROM {$this->table} WHERE survey_id = ?
    ";

    $stmt = $this->db->prepare($query);
    $stmt->bind_param('i', $id);

    if($stmt->execute()) {
      $result = $stmt->get_result();
      $stmt->close();
      return $result;
    }

    return false;
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

    public function updateData($data){
        $query = $this->db->prepare("update {$this->table} set  no_urut=? , kategori_id = ?, soal_jenis= ?, soal_nama = ? where soal_id = ?");

        $query->bind_param('iissi',  $data['no_urut'], $data['kategori_id'],$data['soal_jenis'], $data['soal_nama'], $data['soal_id']);

      if($query->execute()){
        $query->close();
        return true;
      }

      return false;
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        if($query->execute()){
          $query->close();
          return true;
        }

        return false;
    }
}
