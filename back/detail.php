<?php
	$idwisata=$_GET["idwisata"];
	include "koneksi.php";
	$sql="select*from wisata where idwisata='$idwisata'";
	$hasil=mysqli_query($kon,$sql);
	if (!$hasil) die ("Gagal query...");
	
	$data=mysqli_fetch_array($hasil);
	$nama=$data["nama"];
	$kec=$data["kec"];
	$kab=$data["kab"];
	$label=$data["label"];
	$link=$data["link"];
	$deskripsi=$data["deskripsi"];
	$foto=$data["foto"];
?>
	<div id="content">
	<div id="right">
		<div style="margin-right: 30px">
			<img src="<?php echo "pict/".$foto;?>"></a><br/>
		</div>
	</div>
	<div id="right">
		<div style="margin-left: 100px">
		<iframe width="530" height="300" src="<?php echo $link;?>" frameborder="0" allowfullscreen></iframe><br />
		<p><?php echo $deskripsi;?></p><br/>
	</div>
	</div>
	</div>