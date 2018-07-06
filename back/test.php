<select class="dropdown_list" nama="nama">
<?php $query = mysql_query("select * from dropdown_list order by dropdown_list.id") or die (mysql_error());
while ($row = mysql_fetch_array($query)) {
    $nama = strip_tags($row['nama']);

?>
<option value="<?php $nama;?>"><?php echo $nama;?></option>
<?php }?>
</select>