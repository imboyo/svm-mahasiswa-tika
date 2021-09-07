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
        <form class="row g-3" id="tbh-mahasiswa">
          <div class="col-12">
            <label for="mhs-username" class="form-label">Username</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-username" placeholder="Username" name="username">
            </div>
          </div>
          <div class="col-12">
            <label for="mhs-nama" class="form-label">Nama</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-nama" placeholder="Nama" name="nama">
            </div>
          </div>
          <div class="col-12">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select mb-3" aria-label="Default select example" id="mhs-jenis-kelamin">
              <option value="1" selected>Laki-laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="col-12">
            <label for="mhs-ipk" class="form-label">IPK</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-bar-chart-alt-2' ></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-ipk" placeholder="IPK">
            </div>
          </div>
          <div class="col-12">
            <label for="mhs-sks-keseluruhan" class="form-label">SKS Keseluruhan</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-book-content'></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-sks-keseluruhan" placeholder="SKS Keseluruhan" name="sks-keseluruhan">
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
              <input type="text" class="form-control border-start-0" id="mhs-lama-studi" placeholder="Lama Studi" name="lama-studi">
            </div>
          </div>
          <div class="col-12">
            <label for="mhs-password" class="form-label">Password</label>
            <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock"></i></span>
              <input type="text" class="form-control border-start-0" id="mhs-password" placeholder="Password" name="password">
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-danger px-5">Tambah Mahasiswa</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  </div>
</div> 