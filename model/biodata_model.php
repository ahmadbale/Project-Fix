<?php

class Biodata{
  public $db;
  protected $table_dosen = "t_responden_dosen";
  protected $table_mahasiswa = "t_responden_mahasiswa";
  protected $table_industri = "t_responden_industri";
  protected $table_ortu = "t_responden_ortu";
  protected $table_alumni = "t_responden_alumni";
  protected $table_tendik = "t_responden_tendik";


  public function __construct($db)
  {
    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function insertBiodata($jenis, $data){
    date_default_timezone_set('Asia/Jakarta');
    $currentDateTime = date("Y-m-d H:i:s");
      $data_biodata = $data;

    if($jenis == "dosen"){
      $query = $this->db->prepare("INSERT INTO {$this->table_dosen} (survey_id, responden_tanggal, responden_nip, responden_nama, responden_unit) VALUES (?, ?, ?, ?, ?)");
      $query->bind_param("issss", $data_biodata['survey_id'], $currentDateTime, $data_biodata['responden_nip'], $data_biodata['responden_nama'], $data_biodata['responden_unit']);
    }else if($jenis == "mahasiswa"){
      $query = $this->db->prepare("INSERT INTO {$this->table_mahasiswa} (survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_masuk) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $query->bind_param("isssssss", $data_biodata['survey_id'], $currentDateTime, $data_biodata['responden_nim'], $data_biodata['responden_nama'], $data_biodata['responden_prodi'], $data_biodata['responden_email'], $data_biodata['responden_hp'], $data_biodata['tahun_masuk']);
    }else if($jenis == "industri"){
      $query = $this->db->prepare("INSERT INTO {$this->table_industri} (survey_id, responden_tanggal, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $query->bind_param("isssssss", $data_biodata['survey_id'], $currentDateTime, $data_biodata['responden_nama'], $data_biodata['responden_jabatan'], $data_biodata['responden_perusahaan'], $data_biodata['responden_email'], $data_biodata['responden_hp'], $data_biodata['responden_kota']);
    }else if($jenis == "ortu"){
      $query = $this->db->prepare("INSERT INTO {$this->table_ortu} (survey_id, responden_tanggal, responden_nama, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, responden_penghasilan,
      mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $query->bind_param("isssssssssss", $data_biodata['survey_id'], $currentDateTime, $data_biodata['responden_nama'], $data_biodata['responden_jk'], $data_biodata['responden_umur'], $data_biodata['responden_hp'], $data_biodata['responden_pendidikan'], $data_biodata['responden_pekerjaan'], 
      $data_biodata['responden_penghasilan'], $data_biodata['mahasiswa_nim'], $data_biodata['mahasiswa_nama'], $data_biodata['mahasiswa_prodi']);
    }else if($jenis == "alumni"){
      $query = $this->db->prepare("INSERT INTO {$this->table_alumni} (survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi,  responden_email, responden_hp, tahun_lulus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $query->bind_param("isssssss", $data_biodata['survey_id'], $currentDateTime, $data_biodata['responden_nim'], $data_biodata['responden_nama'], $data_biodata['responden_prodi'], $data_biodata['responden_email'], $data_biodata['responden_hp'], $data_biodata['tahun_lulus']);
    }else if($jenis == "tendik"){
      $query = $this->db->prepare("INSERT INTO {$this->table_tendik} (survey_id, responden_tanggal, responden_nopeg, responden_nama, responden_unit) VALUES (?, ?, ?, ?, ?)");
      $query->bind_param("issss", $data_biodata['survey_id'], $currentDateTime, $data_biodata['responden_nopeg'], $data_biodata['responden_nama'], $data_biodata['responden_unit']);
    }

    $query->execute();
    if($query->affected_rows > 0){
      $insertedId = $this->db->insert_id;
    }

    $query->close();

    $data_biodata['id_responden'] = $insertedId;

    return $data_biodata;
  }
}