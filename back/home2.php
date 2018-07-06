<?php
	$nama_wisata="";
	if(isset($_POST["nama_wisata"]))
		$nama_film=$_POST["nama_film"];
	include "koneksi3.php";
	$sql="select*from film where nama like'%".$nama_film."%'order by idfilm desc";
	$hasil=mysqli_query($kon,$sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
		
	$sqlTabelpenggbel="create table if not exists ".$_SESSION["user"]."beli(
					beli int (100) not null)";
	mysqli_query ($kon,$sqlTabelpenggbel) or die ("Gagal Buat Tabel ".$_SESSION["user"]."beli");
	
	$sqlTabelpenggsuk="create table if not exists ".$_SESSION["user"]."suka(
					suka int (100) not null)";
	mysqli_query ($kon,$sqlTabelpenggsuk) or die ("Gagal Buat Tabel ".$_SESSION["user"]."suka");
?>

	<div id="content">
	<table align="center" border="0" cellpadding="0" cellspacing="10">
		<?php
			$no=0;
			echo "<tr height='250px'>";
			$i=0;
			while($row=mysqli_fetch_assoc($hasil))
			{
				if ($i==5)
				{
					echo "<tr>";
					$i=0;
				}
				$i=$i+1;
				if ($row['stok']>0)
				{
				echo " <td><a href='detail.php?idfilm=".$row['idfilm']."'>
					   <img src='pict/{$row['foto']}'width='175'/><br/>
					   </a> <table border='1' align='left' width='175px' ><tr><td bgcolor='#FFFFFF' align='center'>".$row['nama']."</td></tr>
					   <tr><td bgcolor='#FFFFFF' align='left'>Harga	: Rp.".$row['harga']."</td></tr>
					   <tr><td bgcolor='#FFFFFF'align='left'>Stok	: ".$row['stok']."</td></tr>
					   <tr><td align='center' bgcolor='#FFFFFF'><a href='like_proses.php?idfilm=".$row['idfilm']."'><input type='submit' value='LIKE' name='like'></a>
					   <a href='buy_proses.php?idfilm=".$row['idfilm']."'><input type='submit' value='BUY' name='buy'></a></td></tr></td>
					   </table>";
				}
				else
				{
					echo " <td><a href='detail.php?idfilm=".$row['idfilm']."'>
					   <img src='pict/{$row['foto']}'width='175'/><br/>
					   </a> <table border='1' align='left' width='175px' ><tr><td bgcolor='#FFFFFF' align='center'>".$row['nama']."</td></tr>
					   <tr><td bgcolor='#FFFFFF' align='left'>Harga	: Rp.".$row['harga']."</td></tr>
					   <tr><td bgcolor='#FFFFFF'align='left'>Stok	: Tidak tersedia</td></tr>
					   <tr><td align='center' bgcolor='#FFFFFF'><a href='like_proses.php?idfilm=".$row['idfilm']."'><input type='submit' value='LIKE' name='like'></a>
					   </td></tr></td>
					   </table>";
				}
			}
		?>
	</table>
	</div>