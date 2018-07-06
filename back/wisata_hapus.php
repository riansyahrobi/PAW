<?php
	$idwisata = $_GET['idwisata'];
	include "koneksi.php";
	$sql = "select * from wisata where idwisata = '$idwisata' ";
	$hasil = mysqli_query($kon,$sql);
	if(!$hasil) die ('Gagal query...');
	
	$data = mysqli_fetch_array($hasil);
	$nama = $data['nama'];
	$kec = $data['kec'];
	$kab = $data['kab'];
	$label = $data['label'];
	$deskripsi = $_POST['deskripsi'];
	
	echo "<h2>Konfirmasi Hapus</h2>";
	echo "Nama wisata : ".$nama."<br/>";
	echo "Kecamatan : ".$kec."<br/>";
	echo "Kabupaten : ".$kab."<br/>";
	echo "Label".$label."<br/>";
	echo "Deskripsi".$deskripsi."<br/>";
	echo "Foto : <img src='thumb/t_".$foto."'/> <br/><br/>";
	echo "APAKAH DATA INI AKAN DI HAPUS ? <br/>";
	echo "<a href='wisata_hapus.php?idwisata=$idwisata&hapus=1'> YA </a>";
	echo "&nbsp;&nbsp;";
	echo "<a href='info_tampil.php'> TIDAK </a> <br/><br/>";
	
	if(isset($_GET['hapus'])){
		$sql = "delete from wisata where idwisata = '$idwisata'";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil){
			echo "Gagal Hapus wisata : $nama ..<br/>";
			echo "<a href='info_tampil.php'>Kembali ke Daftar wisata</a>";
		} else {
			$gbr = "pict/$foto";
			if(file_exists($gbr)) unlink($gbr);
			$gbr = "thumb/t_$foto";
			if(file_exists($gbr)) unlink($gbr);
			header('location:info_tampil.php');
		}
	}
?>