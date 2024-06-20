<?php

class Responden{
  public $db;
  protected $table_dosen = "t_jawaban_dosen";
  protected $table_mahasiswa = "t_jawaban_mahasiswa";
  protected $table_industri = "t_jawaban_industri";
  protected $table_alumni = "t_jawaban_alumni";
  protected $table_ortu = "t_jawaban_ortu";
  protected $table_tendik = "t_jawaban_tendik";
  protected $responden_dosen = "t_responden_dosen";
  protected $responden_mahasiswa = "t_responden_mahasiswa";
  protected $responden_industri = "t_responden_industri";
  protected $responden_alumni = "t_responden_alumni";
  protected $responden_tendik = "t_responden_tendik";
  protected $responden_ortu = "t_responden_ortu";

  protected $survey = "m_survey";
  protected $soal = "m_survey_soal";

  public function __construct($db)
  {
    $this->db = $db;
    $this->db->set_charset("utf8");
  }

  public function insertData($jenis, $data)
  {
    $result = false;

    if ($jenis == "dosen"){
      $sql = "
            INSERT INTO {$this->table_dosen} (responden_dosen_id, soal_id, jawaban)
            VALUES (?, ?, ?)
        ";

      $stmt = $this->db->prepare($sql);
      foreach ($data as $row) {
        $soal_id = $row[0]['soal_id'];
        $responden_dosen_id = $row[1]['responden_dosen_id'];
        $jawaban = $row[2]['jawaban'];
        $stmt->bind_param("iis", $responden_dosen_id, $soal_id, $jawaban);
        if($stmt->execute()){
          $result = true;
        }else{
          $result = false;
        }
      }

    }else if($jenis == "mahasiswa"){
      $sql = "
            INSERT INTO {$this->table_mahasiswa} (responden_mahasiswa_id, soal_id, jawaban)
            VALUES (?, ?, ?)
        ";

      $stmt = $this->db->prepare($sql);
      foreach ($data as $row) {
        $soal_id = $row[0]['soal_id'];
        $responden_mahasiswa_id = $row[1]['responden_mahasiswa_id'];
        $jawaban = $row[2]['jawaban'];
        $stmt->bind_param("iis", $responden_mahasiswa_id, $soal_id, $jawaban);
        if($stmt->execute()){
          $result = true;
        }else{
          $result = false;
        }
      }
    }else if($jenis == "industri"){
      $sql = "
            INSERT INTO {$this->table_industri} (responden_industri_id, soal_id, jawaban)
            VALUES (?, ?, ?)
        ";

      $stmt = $this->db->prepare($sql);
      foreach ($data as $row) {
        $soal_id = $row[0]['soal_id'];
        $responden_industri_id = $row[1]['responden_industri_id'];
        $jawaban = $row[2]['jawaban'];
        $stmt->bind_param("iis", $responden_industri_id, $soal_id, $jawaban);
        if($stmt->execute()){
          $result = true;
        }else{
          $result = false;
        }
      }
    }else if($jenis == "ortu"){
      $sql = "
            INSERT INTO {$this->table_ortu} (responden_ortu_id, soal_id, jawaban)
            VALUES (?, ?, ?)
        ";

      $stmt = $this->db->prepare($sql);
      foreach ($data as $row) {
        $soal_id = $row[0]['soal_id'];
        $responden_ortu_id = $row[1]['responden_ortu_id'];
        $jawaban = $row[2]['jawaban'];
        $stmt->bind_param("iis", $responden_ortu_id, $soal_id, $jawaban);
        if($stmt->execute()){
          $result = true;
        }else{
          $result = false;
        }
      }
    }else if($jenis == "alumni"){
      $sql = "
            INSERT INTO {$this->table_alumni} (responden_alumni_id, soal_id, jawaban)
            VALUES (?, ?, ?)
        ";

      $stmt = $this->db->prepare($sql);
      foreach ($data as $row) {
        $soal_id = $row[0]['soal_id'];
        $responden_alumni_id = $row[1]['responden_alumni_id'];
        $jawaban = $row[2]['jawaban'];
        $stmt->bind_param("iis", $responden_alumni_id, $soal_id, $jawaban);
        if($stmt->execute()){
          $result = true;
        }else{
          $result = false;
        }
      }
    }else if($jenis == "tendik"){
      $sql = "
            INSERT INTO {$this->table_tendik} (responden_tendik_id, soal_id, jawaban)
            VALUES (?, ?, ?)
        ";

      $stmt = $this->db->prepare($sql);
      foreach ($data as $row) {
        $soal_id = $row[0]['soal_id'];
        $responden_tendik_id = $row[1]['responden_tendik_id'];
        $jawaban = $row[2]['jawaban'];
        $stmt->bind_param("iis", $responden_tendik_id, $soal_id, $jawaban);
        if($stmt->execute()){
          $result = true;
        }else{
          $result = false;
        }
      }
    }

      $stmt->close();
      return $result;
  }

  public function getData($jenis) {
    if($jenis == "dosen"){
      $result = [];

      $responden = $this->db->query("SELECT * FROM {$this->responden_dosen} JOIN {$this->survey} ON {$this->responden_dosen}.survey_id = {$this->survey}.survey_id");

      while ($r = $responden->fetch_assoc()){
        $data_jawaban = [];

        $jawaban_query = $this->db->prepare("SELECT * FROM {$this->table_dosen} JOIN {$this->soal} ON {$this->table_dosen}.soal_id = {$this->soal}.soal_id WHERE responden_dosen_id = ?");
        $jawaban_query->bind_param("i", $r['responden_dosen_id']);
        $jawaban_query->execute();
        $jawaban_result = $jawaban_query->get_result();

        while ($j = $jawaban_result->fetch_assoc()) {
          array_push($data_jawaban, $j);
        }

        array_push($result, [
          "responden" => $r,
          "jawaban" => $data_jawaban
        ]);

        $jawaban_query->close();
      }

      return $result;
    }else if($jenis == "mahasiswa"){
      $result = [];

      $responden = $this->db->query("SELECT * FROM {$this->responden_mahasiswa} JOIN {$this->survey} ON {$this->responden_mahasiswa}.survey_id = {$this->survey}.survey_id");

      while ($r = $responden->fetch_assoc()){
        $data_jawaban = [];

        $jawaban_query = $this->db->prepare("SELECT * FROM {$this->table_mahasiswa} JOIN {$this->soal} ON {$this->table_mahasiswa}.soal_id = {$this->soal}.soal_id WHERE responden_mahasiswa_id = ?");
        $jawaban_query->bind_param("i", $r['responden_mahasiswa_id']);
        $jawaban_query->execute();
        $jawaban_result = $jawaban_query->get_result();

        while ($j = $jawaban_result->fetch_assoc()) {
          array_push($data_jawaban, $j);
        }

        array_push($result, [
          "responden" => $r,
          "jawaban" => $data_jawaban
        ]);

        $jawaban_query->close();
      }

      return $result;
    }else if($jenis == "industri"){
      $result = [];

      $responden = $this->db->query("SELECT * FROM {$this->responden_industri} JOIN {$this->survey} ON {$this->responden_industri}.survey_id = {$this->survey}.survey_id");

      while ($r = $responden->fetch_assoc()){
        $data_jawaban = [];

        $jawaban_query = $this->db->prepare("SELECT * FROM {$this->table_industri} JOIN {$this->soal} ON {$this->table_industri}.soal_id = {$this->soal}.soal_id WHERE responden_industri_id = ?");
        $jawaban_query->bind_param("i", $r['responden_industri_id']);
        $jawaban_query->execute();
        $jawaban_result = $jawaban_query->get_result();

        while ($j = $jawaban_result->fetch_assoc()) {
          array_push($data_jawaban, $j);
        }

        array_push($result, [
          "responden" => $r,
          "jawaban" => $data_jawaban
        ]);

        $jawaban_query->close();
      }

      return $result;
    }else if($jenis == "ortu"){
      $result = [];

      $responden = $this->db->query("SELECT * FROM {$this->responden_ortu} JOIN {$this->survey} ON {$this->responden_ortu}.survey_id = {$this->survey}.survey_id");

      while ($r = $responden->fetch_assoc()){
        $data_jawaban = [];

        $jawaban_query = $this->db->prepare("SELECT * FROM {$this->table_ortu} JOIN {$this->soal} ON {$this->table_ortu}.soal_id = {$this->soal}.soal_id WHERE responden_ortu_id = ?");
        $jawaban_query->bind_param("i", $r['responden_ortu_id']);
        $jawaban_query->execute();
        $jawaban_result = $jawaban_query->get_result();

        while ($j = $jawaban_result->fetch_assoc()) {
          array_push($data_jawaban, $j);
        }

        array_push($result, [
          "responden" => $r,
          "jawaban" => $data_jawaban
        ]);

        $jawaban_query->close();
      }

      return $result;
    }else if($jenis == "alumni"){
      $result = [];

      $responden = $this->db->query("SELECT * FROM {$this->responden_alumni} JOIN {$this->survey} ON {$this->responden_alumni}.survey_id = {$this->survey}.survey_id");

      while ($r = $responden->fetch_assoc()){
        $data_jawaban = [];

        $jawaban_query = $this->db->prepare("SELECT * FROM {$this->table_alumni} JOIN {$this->soal} ON {$this->table_alumni}.soal_id = {$this->soal}.soal_id WHERE responden_alumni_id = ?");
        $jawaban_query->bind_param("i", $r['responden_alumni_id']);
        $jawaban_query->execute();
        $jawaban_result = $jawaban_query->get_result();

        while ($j = $jawaban_result->fetch_assoc()) {
          array_push($data_jawaban, $j);
        }

        array_push($result, [
          "responden" => $r,
          "jawaban" => $data_jawaban
        ]);

        $jawaban_query->close();
      }

      return $result;
    }else if($jenis == "tendik"){
      $result = [];

      $responden = $this->db->query("SELECT * FROM {$this->responden_tendik} JOIN {$this->survey} ON {$this->responden_tendik}.survey_id = {$this->survey}.survey_id");

      while ($r = $responden->fetch_assoc()){
        $data_jawaban = [];

        $jawaban_query = $this->db->prepare("SELECT * FROM {$this->table_tendik} JOIN {$this->soal} ON {$this->table_tendik}.soal_id = {$this->soal}.soal_id WHERE responden_tendik_id = ?");
        $jawaban_query->bind_param("i", $r['responden_tendik_id']);
        $jawaban_query->execute();
        $jawaban_result = $jawaban_query->get_result();

        while ($j = $jawaban_result->fetch_assoc()) {
          array_push($data_jawaban, $j);
        }

        array_push($result, [
          "responden" => $r,
          "jawaban" => $data_jawaban
        ]);

        $jawaban_query->close();
      }

      return $result;
    }
  }
}
