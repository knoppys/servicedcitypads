<form class="form-horizontal home-search" id="home-search">
	<fieldset>

	<!-- Text input-->
	<label for="location">Find your perfect apartment...</label>
	<p style="color: rgb(137, 5, 5) !important;" id="validate">Please fill in the all the form fields</p>

	<div class="row">
		
			<div class="col-sm-6">
				<input type="text" id="location" name="location" class="form-control" placeholder="Location e.g. London">
				<input type="text" id="noofpeople" name="noofpeople" class="form-control" placeholder="Number of People">
				<select id="noofrooms" class="" name="noofrooms">
					<option selected="selected" value="Please Select">Number of rooms</option>
					<option value="Studio">Studio</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>										
				</select>
			</div>
			<div class="col-sm-6">
				<input type="text" id="arrivaldate" name="arrivaldate" class="form-control" placeholder="Arrival Date">
				<input type="text" id="leavingdate" name="leavingdate" class="form-control" placeholder="Departure Date">
				<div class="btn btn-default" id="search-submit" value="Go!">Go!</div>
			</div>
		
		<script type="text/javascript">
			document.getElementById("home-search").reset();
		</script>
	</div>
		
	</fieldset>
</form>