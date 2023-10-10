<?=content_open($title)?>
<div class="mb-3" id="date_input">
    <label for="date_filter" class="form-label">filter date</label>
	<form action="<?=site_url('admin/leafletpoint')?>" method="get">
    <input type="month" class="form-control" id="date_filter">
	<button type="button" class="btn btn-primary mt-2">search</button>
	</form>
  </div>
 	<div id="map"></div>
<?=content_close()?>
