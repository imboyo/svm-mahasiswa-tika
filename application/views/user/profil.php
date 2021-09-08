<div class="page-wrapper">
  <div class="page-content">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Username</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo $detail->username ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Nama Lengkap</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo $detail->nama ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Jenis Kelamin</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo conditional_bool_rendering($detail->jenis_kelamin, 'Laki-laki', 'Perempuan') ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">IPK</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo $detail->ipk ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">SKS Keseluruhan</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo $detail->sks_keseluruhan ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Organisasi</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo conditional_bool_rendering($detail->organisasi, 'Ya', 'Tidak') ?>" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Lama Studi</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="Bay Area, San Francisco, CA" disabled>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-3">
            <h6 class="mb-0">Prediksi Ketepatan Waktu Lulus</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <input type="text" class="form-control" value="<?php echo $detail->prediksi ?>" disabled>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>