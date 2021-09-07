<div class="page-wrapper">
  <div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Data Kriteria / Parameter Variabel Prediksi</div>
    </div>
    <!-- End Breadcrumb -->

    <div class="card">
      <div class="card-body">
        <table class="table mb-0">
          <thead>
            <tr>
              <th scope="col" class="col-1">#</th>
              <th scope="col" class="col-4">Nama</th>
              <th scope="col" class="col-7">Attribut</th>
            </tr>
          </thead>
          <tbody>
            <?php $num = 1 ;foreach($kriteria as $i): ?>
            <tr>
              <th scope="row"><?php echo $num ?></th>
              <td><?php echo $i->nama ?></td>
              <td><?php echo $i->attribute ?></td>
            </tr>
            <?php $num++ ;endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>