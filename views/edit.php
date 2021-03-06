<div class="row">
	<div class="container mt-5">
	  <div class="row justify-content-center">
	    <div class="col-lg-4">

	      <div class="card ">
	        
	        <div class="card-body">
	          <h3 class="text-center">Edit</h3>
	          <hr/>

	          <form method="POST">
	            <div class="row">
	              <div class="col-lg-12">
	                <label>User name</label>
	                <input class="form-control" type="text" name="username" value="<?= $data['username'] ?>" autofocus required />
	              </div>
	            </div>
	            <div class="row">
	              <div class="col-lg-12">
	              	<label>Status</label>
	            	<select class="form-control" name="setIsActive">
	            		<!-- <option value="1">Active</option>
	            		<option value="0">Inactive</option> -->
	            		<?php 
	            		$options = ["Inactive", "Active"];
	            		for($val = 0; $val < count($options); $val++){
	            			$selected = ($val == $data['is_active']) ? "selected" : "";
            			?>
            			<option <?= $selected ?> value="<?= $val ?>"><?= $options[$val] ?></option>
	            		<?php }
	            		?>
	            	</select>
	              </div>
	            </div>
	            <hr/>
	            <button type="submit" name="SaveEdit" class="btn btn-primary btn-block">Save</button>
	          </form>
	          
	        </div>
	      </div>

	    </div>
	  </div>

	</div>
</div>
