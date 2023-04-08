<nav class="navbar navbar-expand-lg">
  <div class="container">
    <div class="navbar-brand w-25" href="<?= site_url('Forums'); ?>">
      <a  href="<?= site_url('Forums'); ?>">
        <span class="fa fa-home btn ">&nbsp;Home</span>
      </a>
    </div>
    
    <form class="d-flex my-auto w-50" method="post" action="http://localhost/ci-betaace/index.php/Search/">
      <input class="form-control me-2" name="search" type="search" placeholder="Search..." aria-label="Search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
      <button class="btn text-light" type="submit">Search</button>
    </form>
    <!-- Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggle" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-cog text-light"></span>
    </button>
    <!-- Links -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
      <ul class="navbar-nav">
        <?php if($this->session->userdata('state') == 'ACTIVE'): ?>        
          <li class="nav-item dropdown">
            <a class="nav-link button btn text-light m-2 dropdown-toggle" data-bs-toggle="dropdown">
              <span class="fa fa-user">&nbsp;<?= $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#accountModal">View User</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo site_url('Edit'); ?>">Edit User</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link button btn text-light m-2" href="<?= site_url('Forums/logout_user'); ?>"><span class="fa fa-sign-out" onclick="return confirm('Select &quot;OK&quot; to log out')">&nbsp;Logout</span></a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link button btn text-light m-2" href="<?= site_url('Login'); ?>"><span class="fa fa-sign-in"> Log In</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link button btn  text-light m-2" href="<?= site_url('Signup'); ?>"><span class="fa fa-vcard"> Sign Up</span></a>
          </li>
        <?php endif; ?>        
      </ul>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-dark border-2">
          <div class="modal-header">
            <h5 class="modal-title" id="accountModalLabel"><span class="text-dark fa fa-user">&nbsp;Account Details</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6>Information</h6>
            <hr class="mt-0 mb-4">
            <div class="row">
              <div class="col-6 mb-3">
                <h6>ID</h6>
                <p class="text-muted"><?= $users->user_id; ?></p>
              </div>
              <div class="col-6 mb-3">
                <h6>Fullname</h6>
                <p class="text-muted"><?= $users->user_firstname. ' ' . $users->user_lastname; ?></p>
              </div>
            </div>
            <h6>Social Information</h6>
            <hr class="mt-0 mb-4">
            <div class="row">
              <div class="col-6 mb-3">
                <h6>Username</h6>
                <p class="text-muted"><?= $users->user_username; ?></p>
              </div>
              <div class="col-6 mb-3">
                <h6>Status</h6>
                <p class="text-muted"><?= $users->user_status; ?></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <?php if($this->session->userdata('status') == 'ADMIN'): ?>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <?php else: ?>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a type="button" class="btn btn-danger" href="<?php echo site_url('Forums/delete_user/'.$this->session->userdata('id')); ?>" onclick="return confirm('Are you sure to delete your account all data related to this account will be wiped too')">Delete Account</a>
            <?php endif; ?>            
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>