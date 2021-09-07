<div class="page-wrapper">
  <div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Admin</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="container">
      <div class="card border-top border-0 border-4 border-danger">
        <div class="card-body p-5">
          <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
            </div>
            <h5 class="mb-0 text-danger">Tambah Admin</h5>
          </div>
          <hr>
          <form class="row g-3" id="tbh-admin-form">
            <div class="col-12">
              <label for="tbh-admin-username" class="form-label">Username</label>
              <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                <input type="text" class="form-control border-start-0" id="tbh-admin-username" placeholder="Username" name="username">
              </div>
            </div>
            <div class="col-12">
              <label for="tbh-admin-password" class="form-label">Password</label>
              <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock"></i></span>
                <input type="text" class="form-control border-start-0" id="tbh-admin-password" placeholder="Password" name="password">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-danger px-5">Tambah Admin</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function(event){
    const TAG_HTML = {
      'form' : $('#tbh-admin-form'),
      'input_username' : $('#tbh-admin-username'),
      'input_password': $('#tbh-admin-password')
    }

    TAG_HTML.form.submit(function(e){
      e.preventDefault();
    })

    
    jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");

    TAG_HTML.form.validate({
      errorClass: 'text-danger ms-2',

      rules: {
        username : {
          required: true,
          minlength: 6,
          noSpace: true,
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
          url: `<?php echo base_url() ?>API_User/tambah_admin`,
          type: "post", 
          datatype: 'json',
          data:  {
            "username" : username,
            "password": password,
          },
          beforeSend: function(){
            SlickLoader.enable();
          },
          complete: function(){
            SlickLoader.disable();
          },
          success: function (response) {
            let response_parsed = JSON.parse(response);

            if (response_parsed.username == 'already exists'){
              Swal.fire({
                icon: 'error',
                title: 'Gagal Menambahkan',
                text: 'Username Telah digunakan - Silahkan gunakan gunakan username lainnya',
              })
            } else if (response == 201) {
              Swal.fire({
                icon: 'success',
                title: 'Good',
                text: 'Akun berhasil dibuat',
                showConfirmButton: false,
                timer: 2000
              }).then(function(){
                window.location.href = `<?php echo base_url('admin/list') ?>`
              })
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Terdapat Kesalahan Request',
                text: 'Silahkan Coba Lagi',
              })
            }
          }
        })
      }
    })
  })
</script>
