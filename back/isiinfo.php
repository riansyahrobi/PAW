<h2>: ISI INFO :</h2>
<form action='info_simpan.php' method='post' enctype="multipart/form-data">
	<table border="1">
		<tr>
			<td>Tempat Wisata</td>
			<td><input type='text' name='nama' /></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td><input type='text' name='kec' /></td>
		</tr>
		<tr>
			<td>Kabupaten</td>
			<td><input type='text' name='kab' /></td>
		</tr>

        <tr>
			<td>Label</td>
			<td><input type='text' name='label' /></td>
		</tr>
        <tr>
			<td>Deskripsi</td>
            <td><textarea rows='4' cols='50' name='deskripsi'>
            </textarea></td>
		</tr>
		<tr>
			<td>Link</td>
            <td><input type='text' name='Link' value="<?php echo $link;?>" style="width:300px;">></td>
		</tr>
        <tr>
			<td>Gambar [max=4MB]</td>
			<td><input type='file' name='foto'></td>
		</tr>
		
		<tr>
			<td colspan='2' align='center'>
				<input type='submit' value='Simpan' name='proses' />
				<input type='reset' value='Reset' name='reset' />
			</td>
		</tr>
	</table>
</form>