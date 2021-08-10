<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
            <?php if (isset($data['error'])) : ?>
              <?php foreach ($data['error'] as $index => $error) : ?>
                <p style="color: red"><?= $error ?></p>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (isset($data['message'])) : ?>
              <?php foreach ($data['message'] as $index => $message) : ?>
                <p style="color: green"><?= $message ?></p>
              <?php endforeach; ?>
            <?php endif; ?>
            <form action="<?= DOCUMENT_ROOT ?>/account/authenticate" method="POST">
              <div class="form-floating mb-3">
                <input onkeyup="checkValidEmail();" name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required autofocus>
                <label for="email">Email address</label>
                <p class="mt-2" id="emailMessage"></p>
              </div>
              <hr>

              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Login</butt>
              </div>

              <a class="d-block text-center mt-2 small" href="<?= DOCUMENT_ROOT ?>/account/register">Do not have an account? Sign Up</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>