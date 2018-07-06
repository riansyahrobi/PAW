<?php
	$nama	= $_POST['nama'];
	$kec	= $_POST['kec'];
	$kab	= $_POST['kab'];
	$label	= $_POST['label'];
	$deskripsi = $_POST['deskripsi'];
	$link = $_POST["link"];
	
	$foto    = $_FILES['foto']['name'];
	$tmpName = $_FILES['foto']['tmp_name'];
	$size    = $_FILES['foto']['size'];
	$type    = $_FILES['foto']['type'];
	
	$maxsize = 4000000;
	$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg","image/JPG","image/jpg");
	
	$dirFoto = "pict";
	if (!is_dir($dirFoto))
	mkdir($dirFoto);
	$fileTujuanFoto = $dirFoto."/".$foto;
	$dirThumb = "thumb";
	if (!is_dir($dirThumb))
	mkdir($dirThumb);
	$fileTujuanThumb = $dirThumb."/t_".$foto;
	$dataValid="Ya";
	if ($size>0)
	{
		if($size>$maxsize)
		{
			echo "Ukuran File Terlalu Besar<br/>";
			$dataValid = "TIDAK";
		}
		if (!in_array ($type, $typeYgBoleh))
		{
			echo "Type File Tidak dikenal<br/>";
			$dataValid="Tidak";
		}
	}
	if (strlen(trim($nama))==0) {
		echo "Nama Wisata Harus Diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($kec))==0) {
		echo "Kecamatan Harus Diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($kab))==0) {
		echo "Kabupaten Harus Diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($deskripsi))==0) {
		echo "Deskripsi Harus Diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($link))==0) {
		echo "Link Harus Diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if ($dataValid == "TIDAK"){
		echo " Masih Ada Kesalahan, Silakan perbaiki! <br/>";
		echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
		exit;
	}
	include "koneksi.php";

	if($foto==null)
	{
		$sql2="update wisata set
				nama = '$nama',
				kec = '$kec',
				kab = '$kab',
				label = '$label',
				deskripsi = '$deskripsi',
				link = '$link',
				foto = '$foto',
				where idwisata = $idwisata";
				$hasil2=mysqli_query($kon,$sql2);
				if (!$hasil2) die ("Gagal query...");
	}
	else
	{
			$sql2="update wisata set
				nama = '$nama',
				kec = '$kec',
				kab = '$kab',
				label = '$label',
				deskripsi = '$deskripsi',
				link = '$link',
				foto = '$foto',
				where idwisata = $idwisata";
				$hasil2=mysqli_query($kon,$sql2);
				if (!$hasil2) die ("Gagal query...");
	}
	if(!$hasil)
	{
		echo"Gagal simpan, silahkan diulangi";
		echo mysqli_error($kon);
		echo"<br/> <input type='button' value='Kembali' onClick='self.history.back()'>";
		exit;
	}
	else
	{
		echo"Simpan data berhasil";
	}
	if($size>0)
	{
		if (!move_uploaded_file ($tmpName, $fileTujuanFoto))
		{
			echo "Gagal upload Gambar..<br/>";
			echo "<a href='barang_tampil.php'>Daftar Barang</a>";
			exit;
		}
		else
		{
			buat_thumbnail ($fileTujuanFoto,$fileTujuanThumb);
		}
	}
	echo "<br/>File sudah di upload.<br/>";
	function buat_thumbnail ($file_src,$file_dst)
	{
		list($w_src,$h_src,$type) = getImageSize ($file_src);
		switch($type)
		{
			case 1;
			$img_src = imagecreatefromgif($file_src);
			break;
			case 2;
			$img_src = imagecreatefromjpeg($file_src);
			break;
			case 3;
			$img_src = imagecreatefrompng($file_src);
			break;
		}
		$thumb = 100;
		if($w_src>$h_src)
		{
			$w_dst = $thumb;
			$h_dst = round ($thumb/$w_src*$h_src);
		}
		else
		{
			$w_dst = round($thumb/$h_src*$w_src);
			$h_dst=$thumb;
		}
		$img_dst = imagecreatetruecolor($w_dst,$h_dst);
		imagecopyresampled($img_dst,$img_src,0,0,0,0,$w_dst,$h_dst,$w_src,$h_src);
		imagejpeg($img_dst,$file_dst);
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}
	echo "<script>alert('Film berhasil diperbaharui!');history.go(-1)</script>";
?>
<?php include_once ('bawah.php'); ?>