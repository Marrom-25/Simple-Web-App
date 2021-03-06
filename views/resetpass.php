<div class="row">
	<div class="container mt-5">
	  <div class="row justify-content-center">
	    <div class="col-lg-4">

	      <div class="card ">
	        
	        <div class="card-body">
	          <h3 class="text-center">Reset Password of "<?= $_GET['username'] ?>"</h3>
	          <hr/>

	          <form method="POST">
	            <div class="row">
	              <div class="col-lg-12">
	                <label>Password</label>
	                <input class="form-control" type="password" name="password" autofocus required />
	              </div>
	            </div>
	            <div class="row">
	              <div class="col-lg-12">
	                <label>Repeat Password</label>
	                <input class="form-control" type="password" name="repeatPass" required />
	              </div>
	            </div>
	            <hr/>
	            <button name="ResetBtn" type="submit" name="SaveEdit" class="btn btn-primary btn-block">Save</button>
	          </form>
	          
	        </div>
	      </div>

	    </div>
	  </div>

	</div>
</div>
