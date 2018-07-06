<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$dbname = "dbpariwisata";

	$kon = mysqli_connect($host, $user, $pass);
	if (!$kon)
		die("Gagal Koneksi...");
	
	$hasil = mysqli_select_db($kon, $dbname);
	if (!$hasil){
		$hasil = mysqli_query($kon, "CREATE DATABASE $dbname");
		if (!$hasil)
			die("GAGAL BUAT DATABASE");
		else
			$hasil = mysqli_select_db($kon, $dbname);
			if (!$hasil) die ("GAGAL KONEK DATABASE");
    }
    $sqlTabelAdmin = 'create table if not exists admin (
        iduser int auto_increment not null primary key,
        user varchar(10) not null default 0,
        pass varchar(10) not null,
        KEY (user))';
        mysqli_query ($kon, $sqlTabelAdmin) or die("Gagal buat tabel Admin");

    $sqlTabelWisata = " create table if not exists wisata(
        idwisata int auto_increment not null primary key,
        nama varchar(40) not null,
        kec varchar(40) not null,
        kab varchar(40) not null ,
        label varchar(10) not null,
        deskripsi text not null,
        link varchar(50) not null,
        foto varchar(70) not null,
        KEY (nama))";
        mysqli_query ($kon, $sqlTabelWisata) or die("Gagal buat tabel Wisata");

    $sqlTabelAkomondasi = "create table if not exists akomondasi(
        idakomondasi int auto_increment not null primary key,
        nama varchar(40) not null,
        kec varchar(40) not null,
        kab varchar(4) not null,
        label varchar(10) not null,
        deskripsi text not null,
        foto varchar(70) not null,
        KEY (nama))";
        mysqli_query ($kon, $sqlTabelAkomondasi) or die("Gagal buat tabel Akomondasi");

   # echo "Tabel Siap <hr/>";
    
?>