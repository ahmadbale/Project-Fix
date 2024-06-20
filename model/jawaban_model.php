<?php

class Jawaban{
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
  protected $responden_ortu = "t_responden_ortu";
  protected $responden_tendik = "t_responden_tendik";

  public function __construct($db)
  {
    $this->db = $db;
    $this->db->set_charset("utf8");
  }

  public function getData($jenis)
  {
    if ($jenis == "dosen"){
      $sql = "SELECT * FROM {$this->table_dosen} JOIN {$this->responden_dosen} ON {$this->table_dosen}.responden_dosen_id = {$this->responden_dosen}.responden_dosen_id";
    }else if($jenis == "mahasiswa"){
      $sql = "SELECT * FROM {$this->table_mahasiswa} JOIN {$this->responden_mahasiswa} ON {$this->table_mahasiswa}.responden_mahasiswa_id = {$this->responden_mahasiswa}.responden_mahasiswa_id";
    }else if($jenis == "industri"){
      $sql = "SELECT * FROM {$this->table_industri} JOIN {$this->responden_industri} ON {$this->table_industri}.responden_industri_id = {$this->responden_industri}.responden_industri_id";
    }else if($jenis == "alumni"){
      $sql = "SELECT * FROM {$this->table_alumni} JOIN {$this->responden_alumni} ON {$this->table_alumni}.responden_alumni_id = {$this->responden_alumni}.responden_alumni_id";
    }else if($jenis == "tendik"){
      $sql = "SELECT * FROM {$this->table_tendik} JOIN {$this->responden_tendik} ON {$this->table_tendik}.responden_tendik_id = {$this->responden_tendik}.responden_tendik_id";
    }else if($jenis == "ortu"){
      $sql = "SELECT * FROM {$this->table_ortu} JOIN {$this->responden_ortu} ON {$this->table_ortu}.responden_ortu_id = {$this->responden_ortu}.responden_ortu_id";
    }

    $rows = [];
    $data = $this->db->query($sql);
    while ($row = $data->fetch_assoc()){
      array_push($rows, $row);
    }

    return $rows;
  }
}
