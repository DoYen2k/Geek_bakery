<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
            <form action="<?= DOCUMENT_ROOT ?>/account/signup" method="POST">

              <div class="form-floating mb-3">
                <input onkeyup="checkValidEmail();" name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required autofocus>
                <label for="email">Email address</label>
                <p class="mt-2" id="emailMessage"></p>
              </div>

              <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" required>
                <label for="floatingInputUsername">Name</label>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-floating mb-3">
                <input name="confirmPassword" type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" required>
                <label for="floatingPasswordConfirm">Confirm Password</label>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</butt>
              </div>

              <a class="d-block text-center mt-2 small" href="<?= DOCUMENT_ROOT ?>/account">Have an account? Sign In</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function checkValidEmail() {
      var emailInput = document.getElementById('email');
      var emailMessage = document.getElementById('emailMessage')

      const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText === "true") {
            emailMessage.innerText = "Email is valid";
            emailMessage.style.color = "green";
          } else if (this.responseText === "false") {
            emailMessage.innerText = "Email already exists";
            emailMessage.style.color = "red";
          } else {
            emailMessage.innerText = "";
          }

        }
      };
      xhttp.open("GET", "<?= DOCUMENT_ROOT ?>/account/checkValidEmail?email=" + emailInput.value, true);
      xhttp.send();

    }
  </script>
</body>