<!-- Posting Section -->
<div class="container">
  <div class="text-center mt-3">
    <?php if($this->session->has_userdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->userdata('error'); ?>
        </div>
    <?php endif; ?>
    <div>
      <p class="card-text"><img src="<?= base_url('uploads/logo/BETAACE.png'); ?>" class="h-50 w-50" alt="..."></p>
      <!-- <p class="card-text h3">Hello There. Do you like to share your thoughts...</p> -->
    </div>
  </div>
  <hr>
  <div class="m-3">
    <a href="<?php echo site_url('Forums/add_post'); ?>" class="input-group" style="text-decoration: none;">      
      <input type="text" class="form-control"  placeholder="Share your discussion..." >
      <span class="input-group-text bg-success text-light" style="cursor: pointer;">Create Post</span>
    </a>
  </div>
</div>
<!-- New Discussion Header -->
<div class="container">
  <h4>New Discussion</h4>
  <!-- Discussion Details -->
  <div class="row justify-content-center">
    <?php if(!empty($posts)): ?>
      <?php foreach($posts as $post): ?>
          <?php if($post->post_photo == 'NULL'): ?>
            <!-- POST START -->
            <div class="col-md-12">                    
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative border-dark bg-light">
                <div class="card-header">
                  <h3 class="mb-0">
                    <span class="fa fa-book">&nbsp; <?= $post->post_title; ?></span>                    
                    <span class="float-end fa fa-calendar-plus-o">&nbsp; <?= date( 'F d', strtotime( $post->post_created ) ); ?></span>
                  </h3>
                </div>              
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary fa fa-user">&nbsp; Created By: <?= $post->user_username; ?></strong>                  
                  <div class="h1"><span class="fa fa-sticky-note">&nbsp; <?= $post->post_description; ?></span></div>                              
                </div> 
                <div class="card-footer">
                  <?php if($this->session->userdata('state') == 'ACTIVE'): ?>
                      <!-- User who created the post or admin can edit and delete -->
                      <?php if($this->session->userdata('id') == $post->user_id): ?>
                        <div class="center">
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/read_post/'.$post->post_id);?>"><i class="fa fa-comment">&nbsp; Read Post/Comments</i></a>
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/edit_post/'.$post->post_id);?>"><i class="fa fa-edit">&nbsp; Edit Post</i></a>
                          <a class="btn btn-outline-danger rounded-pill" href="<?= site_url('Forums/delete_post/'.$post->post_id);?>" onclick="return confirm('Are you sure to delete the post')"><i class="fa fa-remove">&nbsp; Delete Post</i></a>
                        </div>
                      <?php elseif($this->session->userdata('status') == 'ADMIN'): ?>
                        <div class="center">
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/read_post/'.$post->post_id);?>"><i class="fa fa-comment">&nbsp; Read Post/Comments</i></a>
                          <a class="btn btn-outline-danger rounded-pill" href="<?= site_url('Forums/delete_post/'.$post->post_id);?>" onclick="return confirm('Are you sure to delete the post')"><i class="fa fa-remove">&nbsp; Delete Post</i></a>
                        </div>
                      <?php else: ?>
                        <div class="center">
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/read_post/'.$post->post_id);?>"><i class="fa fa-comment">&nbsp; Read Post/Comments</i></a>
                        </div>                        
                      <?php endif; ?>      
                    <?php else: ?>
                      <div class="center">
                        <a class="btn btn-outline-dark rounded-pill w-100" href="<?= site_url('Forums/read_post/'.$post->post_id);?>">Continue reading</a>
                      </div>
                  <?php endif; ?> 
                </div>       
              </div>
            </div>
          <?php else: ?>
            <div class="col-md-12">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative border-dark bg-light">
                <div class="card-header">
                  <h3 class="mb-0">
                    <span class="fa fa-book">&nbsp; <?= $post->post_title; ?></span>                    
                    <span class="float-end fa fa-calendar-plus-o">&nbsp; <?= date( 'F d', strtotime( $post->post_created ) ); ?></span>
                  </h3>
                </div> 
                <div class="col-auto d-none d-lg-block">
                  <img class="bd-placeholder-img" src="<?= base_url('uploads/images/'.$post->post_photo); ?>">   
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary fa fa-user">&nbsp; Created By: <?= $post->user_username; ?></strong>                  
                  <div class="h1"><span class="fa fa-sticky-note">&nbsp; <?= $post->post_description; ?></span></div>                              
                </div>
                <div class="card-footer">
                  <?php if($this->session->userdata('state') == 'ACTIVE'): ?>
                      <!-- User who created the post or admin can edit and delete -->
                      <?php if($this->session->userdata('id') == $post->user_id): ?>
                        <div class="center">
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/read_post/'.$post->post_id);?>"><i class="fa fa-comment">&nbsp; Read Post/Comments</i></a>
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/edit_post/'.$post->post_id);?>"><i class="fa fa-edit">&nbsp; Edit Post</i></a>
                          <a class="btn btn-outline-danger rounded-pill" href="<?= site_url('Forums/delete_post/'.$post->post_id);?>" onclick="return confirm('Are you sure to delete the post')"><i class="fa fa-remove">&nbsp; Delete Post</i></a>
                        </div>
                      <?php elseif($this->session->userdata('status') == 'ADMIN'): ?>
                        <div class="center">
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/read_post/'.$post->post_id);?>"><i class="fa fa-comment">&nbsp; Read Post/Comments</i></a>
                          <a class="btn btn-outline-danger rounded-pill" href="<?= site_url('Forums/delete_post/'.$post->post_id);?>" onclick="return confirm('Are you sure to delete the post')"><i class="fa fa-remove">&nbsp; Delete Post</i></a>
                        </div>
                      <?php else: ?>
                        <div class="center">
                          <a class="btn btn-outline-dark rounded-pill" href="<?= site_url('Forums/read_post/'.$post->post_id);?>"><i class="fa fa-comment">&nbsp; Read Post/Comments</i></a>
                        </div>                        
                      <?php endif; ?>      
                    <?php else: ?>
                      <div class="center">
                        <a class="btn btn-outline-dark rounded-pill w-100" href="<?= site_url('Forums/read_post/'.$post->post_id);?>">Continue reading</a>
                      </div>
                  <?php endif; ?> 
                </div>      
              </div>
            </div>
          <?php endif; ?>
          <!-- POST END -->
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative border-dark bg-light">
          <div class="col p-4 d-flex flex-column position-static">    
            <h3>The discussion page is empty! Be the first to discuss a Topic!</h3>          
          </div>      
        </div>
      </div>
    <?php endif; ?>
  </div>
  <!-- Pagination -->
  <?= $links; ?>
</div>