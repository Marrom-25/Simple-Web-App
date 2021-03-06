<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-4">

      <div class="card ">
        
        <div class="card-body">
          <h3 class="text-center">Sign-in</h3>
          <hr/>

          <form method="POST">
            <div class="row">
              <div class="col-lg-12">
                <label>User name</label>
                <input class="form-control" type="text" name="username" autofocus required />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label>Password</label>
                <input class="form-control" type="password" name="password" required />
              </div>
            </div>
            <hr/>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <hr/>
          <a class="text-center" href="/test/?page=register">Click here to register</a>
        </div>
      </div>

    </div>
  </div>

</div>

<script>
(() => {
  document.body.className = 'bg-primary';
})();
</script>