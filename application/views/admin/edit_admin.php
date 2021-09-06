<div class="page-wrapper">
  <div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Admin</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
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
            <h5 class="mb-0 text-danger">Edit Admin</h5>
          </div>
          <hr>
          <form class="row g-3" id="edit-admin-form">
            <div class="col-12">
              <label for="edit-admin-username" class="form-label">Username</label>
              <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                <input type="text" class="form-control border-start-0" id="edit-admin-username" placeholder="Username" name="username" value="<?php echo $user->username ?>">
              </div>
            </div>
            <div class="col-12">
              <label for="edit-admin-password" class="form-label">Password</label>
              <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock"></i></span>
                <input type="text" class="form-control border-start-0" id="edit-admin-password" placeholder="Password" name="password">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-danger px-5">Edit Admin</button>
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
      'form' : $('#edit-admin-form'),
      'input_username' : $('#edit-admin-username'),
      'input_password': $('#edit-admin-password')
    }

    TAG_HTML.form.submit(function(e){
      e.preventDefault();
    })

    TAG_HTML.form.validate({
      errorClass: 'text-danger ms-2',

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
          url: `<?php echo base_url() ?>API_User/tambah_admin?edit=true&id=<?php echo $user->id ?>`,
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
                title: 'Gagal Mengedit',
                text: 'Username Telah digunakan - Silahkan gunakan gunakan username lainnya',
              })
            } else if (response == 200) {
              Swal.fire({
                icon: 'success',
                title: 'Good',
                text: 'Berhasil Diedit',
                showConfirmButton: false,
                timer: 2000
              }).then(function(){
                window.location.href = `<?php echo base_url('admin') ?>`
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
