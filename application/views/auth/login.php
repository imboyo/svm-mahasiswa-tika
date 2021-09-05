<body class="bg-login">
      <!--wrapper-->
    <div class="wrapper">
      <div
        class="
          section-authentication-signin
          d-flex
          align-items-center
          justify-content-center
          my-5 my-lg-0
        "
      >
        <div class="container-fluid">
          <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
              <div class="mb-4 text-center">
                <img src="assets/images/logo-img.png" width="180" alt="" />
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="border p-4 rounded">
                    <div class="text-center">
                      <h3 class="">Sign in</h3>
                    </div>
                    <div class="form-body">
                      <form class="row g-3" id="form-login">
                        <div class="col-12">
                          <label for="login_username" class="form-label"
                            >Username</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="login_username"
                            placeholder="Username"
                            name="username"
                          />
                        </div>
                        <div class="col-12">
                          <label for="login_password" class="form-label"
                            >Enter Password</label
                          >
                          <div class="input-group">
                            <input
                              type="password"
                              class="form-control border-end-0"
                              id="login_password"
                              value="12345678"
                              placeholder="Enter Password"
                              name="password"
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                              <i class="bx bxs-lock-open"></i>Sign in
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end row-->
        </div>
      </div>
    </div>
    <!--end wrapper-->

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    const TAG_HTML = {
      'form' : $('#form-login'),
      'input_username': $('#login_username'),
      'input_password' : $('#login_password'),
    }

    TAG_HTML.form.submit(function(event){
      event.preventDefault();
    })

    TAG_HTML.form.validate({
      errorClass : 'text-danger',

      rules: {
        username : {
          required: true,
          minlength: 6,
        },
        password: {
          required: true,
          minlength: 6,
        }
      },

      submitHandler: function(){
        let username = TAG_HTML.input_username.val()
        let password = TAG_HTML.input_password.val()

        $.ajax({
          url: `<?php echo base_url() ?>API_Auth/login`,
          type: "post", 
          datatype: 'json',
          data:  {
            "username" : username,
            "password": password,
          },
          error:function(){
            Swal.fire({
              icon: 'error',
              title: 'Login Gagal',
              text: 'Terdapat kesalahan'
            })
          },
          beforeSend: function(){
            SlickLoader.enable();
          },
          complete: function(){
            SlickLoader.disable();
          },
          success: function (response) {
            if(response == 202){
              Swal.fire({
                icon: 'success',
                title: 'Good',
                text: 'Login Berhasil',
                showConfirmButton: false,
                timer: 1500
              }).then(function(){
                window.location.href = `<?php echo base_url() ?>`
              })
            } else if(response == 401) {
              Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Akun tidak ditemukan',
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Kesalahan Server',
              })
            }
          }

        })
      }
    })
  })
</script>
