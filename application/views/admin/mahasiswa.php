<div class="page-wrapper">
  <div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Daftar Mahasiswa</div>
      <div class="ms-auto">
        <a href="<?php echo base_url('admin/tambah_mahasiswa') ?>" class="btn bg-info">Tambah Mahasiswa</a>
      </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="card">
      <div class="card-body">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col" >Jenis Kelamin</th>
              <th scope="col" >IPK</th>
              <th scope="col" >SKS Keseluruhan</th>
              <th scope="col" >Organisasi</th>
              <th scope="col" >Lama Studi</th>
              <th scope="col" >Prediksi Lulus Tepat Waktu</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Laki-laki</td>
              <td>3,78</td>
              <td>120</td>
              <td>Tidak</td>
              <td>3,5 Tahun</td>
              <td>Tidak Tepat Waktu</td>
              <td>
                <a href="<?php echo base_url('admin/edit_mahasiswa/123') ?>" class="btn bg-warning">Edit</a>
                <a href="" class="btn bg-danger">Hapus</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination round-pagination  d-flex justify-content-center">
        <li class="page-item"><a class="page-link" href="javascript:;">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="javascript:;javascript:;">1</a>
        </li>
        <li class="page-item active"><a class="page-link" href="javascript:;">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="javascript:;">3</a>
        </li>
        <li class="page-item"><a class="page-link" href="javascript:;">Next</a>
        </li>
      </ul>
		</nav>

  </div>
</div>