<?php

class Survey{
  public $db;
  protected $table = "m_survey";
  public function __construct($db){
    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function getData(){
    $data = $this->db->query('SELECT survey_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi FROM ' . $this->table);

    return $data;
  }

  public function getDataByKategori($jenis){
    $data = $this->db->query('SELECT survey_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi FROM ' . $this->table);
    $rows = [];
    while ($row = $data->fetch_assoc()){
      if($row['survey_jenis'] == $jenis){
      array_push($rows, $row);
      }
    }

    return $rows;
  }

  public function createDataSurvey($data)
  {
    $sql = "
      INSERT INTO {$this->table} (user_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal)
      VALUES (?, ?, ?, ?, ?, ?);
    ";

    $user_id = $_SESSION['user_id'];

    $surveyDate = date("Y-m-d H:i:s");

    $stmt = $this->db->prepare($sql);

    $stmt->bind_param("isssss", $user_id, $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $surveyDate);

    $stmt->execute();

    if($stmt->affected_rows > 0){
      $stmt->close();
      return true;
    }

    return false;
  }

  public function editSurveyById($data)
  {
    $sql = "
        UPDATE {$this->table}
        SET survey_kode = ?, survey_nama = ?, survey_deskripsi = ?, survey_tanggal = ?, user_id = ? WHERE survey_id = ?
    ";
    $idUser = $_SESSION['user_id'];
    $surveyDate = date("Y-m-d H:i:s");

    $stmt = $this->db->prepare($sql);

    $stmt->bind_param("ssssii", $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $surveyDate, $idUser, $data['survey_id']);

    $stmt->execute();

    if($stmt->affected_rows > 0){
      $stmt->close();
      return true;
    }

    return false;
  }

  public function deleteDataById($id)
  {
    $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE survey_id = ?");

    $stmt->bind_param('i', $id);

    if($stmt->execute()){
      $stmt->close();
      return true;
    }

    return false;
  }

}
