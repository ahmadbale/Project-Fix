<?php 
include_once('model/kategori_model.php');
 
 $act = $_GET['act'];

 if($act == 'simpan'){
    echo '<pre>';
    $data = [
        'kategori_nama' => $_POST['kategori_nama']
    ];

    $insert = new Kategori();
    $insert->insertData($data);

    header('location: kategori.php?status=sukses&message=Data berhasil disimpan');
 }

 if($act == 'edit'){
    $id = $_GET['id'];

    $data = [
        'kategori_nama' => $_POST['kategori_nama']
    ];

    $update = new Kategori();
    $update->updateData($id, $data);

    header('location: kategori.php?status=sukses&message=Data berhasil diubah');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new Kategori();
    $hapus->deleteData($id);

    header('location: kategori.php?status=sukses&message=Data berhasil dihapus');
 }