<div class="page-wrapper">
  <div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Mahasiswa</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item active" aria-current="page">Tambah Mahasiswa</li>
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
          <h5 class="mb-0 text-danger">Tambah Mahasiswa</h5>
        </div>
        <hr>
        <form class="row g-3" id="edit-mahasiswa">
          <div class="col-12">
            <label for="mhs-username" class="form-label">Username</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-username" placeholder="Username" name="username" value="<?php echo $mahasiswa->username ?>">
            </div>
          </div>
          <div class="col-12">
            <label for="mhs-nama" class="form-label">Nama</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-nama" placeholder="Nama" name="nama" value="<?php echo $mahasiswa->nama ?>">
            </div>
          </div>
          <div class="col-12">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select mb-3" aria-label="Default select example" id="mhs-jenis-kelamin">
              <option value="1">Laki-laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="col-12">
            <label for="mhs-ipk" class="form-label">IPK</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-bar-chart-alt-2' ></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-ipk" placeholder="IPK" value="<?php echo $mahasiswa->ipk ?>">
            </div>
          </div>
          <div class="col-12">
            <label for="mhs-sks-keseluruhan" class="form-label">SKS Keseluruhan</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-book-content'></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-sks-keseluruhan" placeholder="SKS Keseluruhan" name="sks-keseluruhan" value="<?php echo $mahasiswa->sks_keseluruhan ?>">
            </div>
          </div>
          <div class="col-12">
            <label class="form-label">Organisasi</label>
            <select class="form-select mb-3" aria-label="Default select example" id="mhs-organisasi">
              <option value="1">Ya</option>
              <option value="0" selected>Tidak</option>
            </select>
          </div>
          <div class="col-12">
            <label for="mhs-lama-studi" class="form-label">Lama Studi</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-time' ></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-lama-studi" placeholder="Lama Studi" name="lama-studi" value="<?php echo $mahasiswa->lama_studi; ?>">
            </div>
          </div>
          <div class="col-12">
            <label for="mhs-password" class="form-label">Password</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock"></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-password" placeholder="Password" name="password">
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-danger px-5">Edit Mahasiswa</button>
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
      'form' : $('#edit-mahasiswa'),
      'username' : $('#mhs-username'),
      'nama' : $('#mhs-nama'),
      'jenis_kelamin' : $('#mhs-jenis-kelamin'),
      'ipk' : $('#mhs-ipk'),
      'sks_keseluruhan' : $('#mhs-sks-keseluruhan'),
      'organisasi' : $('#mhs-organisasi'),
      'lama_studi' : $('#mhs-lama-studi'),
      'password' : $('#mhs-password'),
    }

    jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");

    TAG_HTML.form.submit(function(event){
      event.preventDefault();
    })

    TAG_HTML.form.validate({
      errorClass: 'text-danger ms-2',
        

      rules: {
        username : {
          required: true,
          minlength: 6,
          noSpace: true,
        },
        nama: {
          required:true,
        },
        jenis_kelamin: {
          required:true,
        },
        ipk: {
          required:true,
        },
        sks_keseluruhan: {
          required:true,
        },
        lama_studi: {
          required:true,
        },
        password: {
          required:true,
          minlength: 6,
        }
      },

      submitHandler: function(){
        let username = TAG_HTML.username.val()
        let nama = TAG_HTML.nama.val()
        let jenis_kelamin = TAG_HTML.jenis_kelamin.val()
        let ipk = TAG_HTML.ipk.val()
        let sks_keseluruhan = TAG_HTML.sks_keseluruhan.val()
        let organisasi = TAG_HTML.organisasi.val()
        let lama_studi = TAG_HTML.lama_studi.val()
        let password = TAG_HTML.password.val()

        $.ajax({
          url: `<?php echo base_url() ?>API_Mahasiswa/tambah_mahasiswa?edit=true&id=<?php echo $mahasiswa->user_id ?>`,
          type: "post", 
          dataType: 'json',
          data: {
            "username": username,
            "nama" : nama,
            "jenis_kelamin": jenis_kelamin,
            "ipk": ipk,
            "sks_keseluruhan": sks_keseluruhan,
            'organisasi' : organisasi,
            'lama_studi' : lama_studi,
            'password' : password,
          },
          beforeSend: function(){
            SlickLoader.enable();
          },
          complete: function(){
            SlickLoader.disable();
          },
          success: function(response){
            if (response == 200){
              Swal.fire({
                icon: 'success',
                title: 'Good',
                text: 'Akun berhasil dibuat',
                showConfirmButton: false,
                timer: 2000
              }).then(function(){
                window.location.href = `<?php echo base_url('admin/mahasiswa') ?>`
              })
            } else if (response.username.length > 0){
              Swal.fire({
                icon: 'warning',
                title: 'Coba Lagi',
                text: 'Username Telah Digunakan',
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Kesalahan Server',
                text: 'Silahkan Coba Lagi',
              })
            }
          },
          error: function(error){
            Swal.fire({
              icon: 'error',
              title: 'Terdapat Kesalahan Request',
              text: 'Silahkan Coba Lagi',
            })
          }
          
        })
      }
    })
  })
</script>