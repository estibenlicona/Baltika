<div class="container">
  <br><br><br>
  <div class="row justify-content-center align-items-center p-4">
    <div class="col-md-4">
      <form action="<?=base_url('login/validate')?>" method="post">
        <div class="form-group">
          <span class="login100-form-title text-dark">
            <h1>Control Pane</h1>
          </span>
        </div>
        <div class="form-group">
          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="username" placeholder="Email" style="display:none">
            <input class="input100 rounded" type="text" name="username" placeholder="Username" autocomplete="nope" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="material-icons md-24 ">account_box</i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <div class="wrap-input100">
            <input class="input100 rounded" type="password" name="pass" placeholder="Password" autocomplete="nope" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="material-icons md-24">lock</i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn rounded bg-dark">
              Login
            </button>
          </div>
        </div>
        <div class="form-group">
          <div class="text-center p-t-12">
            <a class="txt2" href="<?=base_url('users/create') ?>">¿Create Account?</a>
					</div>
        </div>
        <div class="form-group">
          <div class="alert-error text-center"><?=$this->session->flashdata('mensaje')?></div>
        </div>
      </form>
    </div>
  </div>
</div>
