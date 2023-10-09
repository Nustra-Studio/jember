<?
$bulan = $_POST['tgl'];
$sql = "SELECT * FROM t_hotspot where month(tgl)='$bulan'";
$bulan = $_POST['tgl'];
$sql = "SELECT * from t_hotspot where month(tgl)='$bulan'";
?>
<?=content_open($title)?>
    <div class="input-group input-group-sm mb-3">
      <form method="POST" action="" class="form-inline">
       <label for="date1">Tampilkan transaksi bulan </label>
       <select class="form-control mr-2" name="bulan">
        <option value="">-</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
       </select>
       <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
      </form>
    </div>
 	<div id="map"></div>
<?=content_close()?>
