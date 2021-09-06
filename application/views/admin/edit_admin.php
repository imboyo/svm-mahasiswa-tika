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
              <label for="edit-tbh-admin-password" class="form-label">Password</label>
              <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock"></i></span>
                <input type="text" class="form-control border-start-0" id="edit-tbh-admin-password" placeholder="Password" name="password">
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

