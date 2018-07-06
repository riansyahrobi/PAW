<?php
	$nama_wisata="";
	if(isset($_POST["nama"]))
		$nama_wisata=$_POST["nama"];
	include "koneksi.php";
	$sql="select*from wisata where nama like'%".$nama_wisata."%'order by idwisata desc";
	$hasil=mysqli_query($kon,$sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
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
				echo " <td><a href='detail.php?idwisata=".$row['idwisata']."'>
					   <img src='pict/{$row['foto']}'width='175'/><br/>
					   </a> <table border='0' align='left' width='175px' ><tr><td bgcolor='#FFFFFF' align='center'>".$row['nama']."</td></tr>
					   </table>";
				}
				else
				{
					echo " <td><a href='detail.php?idwisata=".$row['idwisata']."'>
					   <img src='pict/{$row['foto']}'width='175'/><br/>
					   </a> <table border='0' align='left' width='175px' ><tr><td bgcolor='#FFFFFF' align='center'>".$row['nama']."</td></tr>
					   </td></tr></td>
					   </table>";
				}
			}
		?>
	</table>
	</div>