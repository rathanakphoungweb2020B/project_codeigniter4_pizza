<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__header">
  
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="/register" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title">
        <img src="images/logo.svg" alt="" width="50">
        Peperoni App
        </h3>
        
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" value="<?= set_value('email'); ?>">
          </div>

          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="">
          </div>

          <div class="form-group">
            <label class="text-uppercase small">Address</label>
            <textarea type="text" name="address"  class="form-control" placeholder="Address" id="address" value="<?= set_value('address'); ?>"></textarea>
          </div>

          <?php if(isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="role" value="1">I'm a manager
            </label>
          </div>
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="/" class="small text-uppercase">
            SIGN IN INSTEAD
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>







