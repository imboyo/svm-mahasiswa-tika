<div class="page-wrapper">
  <div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Daftar Admin</div>
      <div class="ms-auto">
        <a href="<?php echo base_url('admin/tambah') ?>" class="btn bg-info">Tambah Admin</a>
      </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="card">
      <div class="card-body">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col" class="col-1">#</th>
              <th scope="col" class="col-3">Username</th>
              <th scope="col" class="col-8">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($admin as $i): ?>
            <tr>
                <th scope="row"><?php echo $table_num ?></th>
                  <td><?php echo $i->username ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/edit_admin/').$i->id ?>" class="btn bg-info">Edit</a>
                    <a href="" class="btn bg-danger">Hapus</a>
                </td>
              </tr>
              <?php $table_num++;endforeach ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php echo $pagination ?>

  </div>
</div>
