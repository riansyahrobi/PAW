<?php
	$nama_wisata = "";
	if(isset($_POST["nama_wisata"]))
		$nama_wisata = $_POST["nama_wisata"];
		
	include "koneksi.php";
	$sql = "select * from wisata where nama like '%".$nama_wisata."%' order by idwisata desc";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil)
		die("Gagal quey..".mysqli_error($kon));
?>
<a href="isiinfo.php">INPUT wisata</a>
&nbsp; &nbsp; &nbsp;
<a href="wisata_cari.php">CARI wisata</a>
<table border="1">
	<tr>
		<th>Foto</th>
		<th>Informasi</th>
	</tr>
	<?php
		$no = 0;
		while($row = mysqli_fetch_assoc($hasil)) {
			echo " <tr> ";
			echo "	<td> <a href='pict/{$row['foto']}' />
							<img src='thumb/t_{$row['foto']}' width='100' />
						 </a>
					</td> ";
			echo "	<td> ".$row['nama']." </td> ";
			echo "	<td> ".$row['deskripsi']." </td> ";
			echo "	<td> ";
			echo "		<a href='wisata_edit.php?idwisata=" . $row['idwisata'] . " '>EDIT </a> ";
			echo "		&nbsp;&nbsp;";
			echo "		<a href='wisata_hapus.php?idwisata=" . $row['idwisata'] . " '>HAPUS</a> ";
			echo "	</td> ";
			echo " </tr> ";
		}
	?>
</table>