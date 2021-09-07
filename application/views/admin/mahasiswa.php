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
            <?php $table_num ;foreach($mahasiswa as $i): ?>
            <tr>
              <th scope="row"><?php echo $table_num ?></th>
              <td><?php echo $i->nama ?></td>
              <td><?php echo $i->username ?></td>
              <td><?php echo $i->jenis_kelamin ?></td>
              <td><?php echo $i->ipk ?></td>
              <td><?php echo $i->sks_keseluruhan ?></td>
              <td><?php echo $i->organisasi ?></td>
              <td><?php echo $i->lama_studi ?></td>
              <td><?php echo $i->prediksi ?></td>
              <td>
                <a href="<?php echo base_url('admin/edit_mahasiswa/123') ?>" class="btn bg-warning">Edit</a>
                <a class="btn bg-danger" onclick="delete_mahasiswa(<?php echo $i->user_id ?>)">Hapus</a>
              </td>
            </tr>
            <?php $table_num++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <?php echo $pagination ?>

  </div>
</div>

<script>
  function delete_mahasiswa(id){
    $.ajax({
      url: `<?php echo base_url() ?>API/admin/delete_mahasiswa/${id}`,
      type: "get", 
      datatype: 'json',

      beforeSend: function(){
        SlickLoader.enable();
      },
      complete: function(){
        SlickLoader.disable();
      },
      success: function(response){
        if(response == 200){
            Swal.fire({
              icon: 'success',
              title: 'Good',
              text: 'Berhasil Dihapus',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
              window.location.href = `<?php echo base_url('admin/mahasiswa') ?>`
          })
        } else {
            Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Kesalahan Server',
          })
        }
      }
    })
  }

</script>