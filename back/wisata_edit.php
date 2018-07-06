<?php
	$idwisata=$_GET["idwisata"];
	include "koneksi.php";
	$sql="select*from wisata where idwisata='$idwisata'";
	$hasil=mysqli_query($kon,$sql);
    if (!$hasil) die ("Gagal Query");
    $data=mysqli_fetch_array($hasil);
    $idwisata=$data["idwisata"];
    $nama = $data['nama'];
	$kec = $data['kec'];
	$kab = $data['kab'];
	$label = $data['label'];
	$deskripsi = $_POST['deskripsi'];
#    $link=$data['link'];
	$link = $data['link'];
	$foto = $data['foto'];
?>

 <div id="content">
<form action='wisata_update.php' method="post" enctype="multipart/form-data">
<input type='hidden' name='idwisata' value="<?php echo $idwisata;?>"/>
<br/><table border="1" align="center" bgcolor='#FFFFFF'>
<tr>
    <td colspan="2" align="center"><h2>::ISI wisata::<h2></td>
</tr>
    <tr>
        <td>Nama wisata</td>
        <td><input type='text' name='nama' value="<?php echo $nama;?>" style="width:300px;"></td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td><input type='text' name='kec' value="<?php echo $kec;?>" style="width:300px;"></td>
    </tr>
    <tr>
        <td>Kabupaten</td>
        <td><input type='text' name='kab' value="<?php echo $kab;?>" style="width:300px;"></td>
    </tr>
    <tr>
        <td>Label</td>
        <td><input type='text' name='label' value="<?php echo $label;?>" style="width:300px;"></td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td><textarea row='4' cols='50' name='deskripsi' value="<?php echo $deskripsi;?>" style="width:300px;"></textarea></td>
    </tr>
<tr>
        <td>Link</td>
        <td><input type='text' name='Link' value="<?php echo $link;?>" style="width:300px;"></td>
    </tr>
    <tr>
        <td>Gambar [max=4MB]</td>
        <td><img id="uploadPreview" style="width: 150px; height: 150px;" src="<?php echo "pict/".$foto;?>" /><br>
        <input id="uploadImage" type="file" name="foto" onchange="PreviewImage();" /></td>
        <input type="hidden" name="fotonama" value="<?php echo $foto;?>"/>
    </tr>>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="simpan" name="proses">
            <input type="reset" value="reset" name="reset">
        </td>
    </tr>
</table><br/>
</form>
    </div>