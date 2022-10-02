<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-3">
    <div class="card border-dark" style="border-radius: 1rem;">
        <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="<?= base_url('uploads/logo/side.jpg'); ?>"
                alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex">
                <div class="card-body p-4 text-black">                
                    <?= form_open('Edit/edit_validation/'.$users->user_id);?>                    
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <span class="h1 fw-bold mb-0 w-100">Edit User</span>
                            <a href="<?php echo site_url('Forums'); ?>" class="btn btn-danger float-end p-3"><span class="d-flex fa fa-arrow-circle-left">&nbsp&nbspBack</span></a>
                        </div>
                        <?php if(isset($success)):?>
                        <div class="form-group">
                            <div class="alert alert-success text-dark text-center">
                            <h4><?= $success; ?></h4>
                            </div>
                        </div>
                        <?php endif;?>
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Update your account details</h5>
                        
                        <div class="form-outline row">
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Firstname</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa-user"></span></div>
                                    <input name="firstName" type="text" class="form-control form-control-lg" placeholder="Firstname" value="<?= $users->user_firstname; ?>">
                                </div>                                
                                <small class="text-danger"><?php echo form_error('firstName') ?></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Lastname</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa-user"></span></div>
                                    <input name="lastName" type="text" class="form-control form-control-lg" placeholder="Lastname" value="<?= $users->user_lastname; ?>">
                                </div>                                
                                <small class="text-danger"><?php echo form_error('lastName') ?></small>
                            </div>                           
                        </div>

                        <div class="form-outline row">
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Username</label>
                                <div class="input-group">
                                    <div class="input-group-text">@</div>
                                    <input name="username" type="text" class="form-control form-control-lg" placeholder="Username" value="<?= $users->user_username; ?>" disabled>
                                </div>
                                <small class="text-danger"><?php echo form_error('username') ?></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Email</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa fa-envelope"></span></div>
                                    <input name="email" type="text" class="form-control form-control-lg" placeholder="Email" value="<?= $users->user_email; ?>" disabled>
                                </div>
                                <small class="text-danger"><?php echo form_error('email') ?></small>
                            </div>                           
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">Current Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><span class="fa fa fa-lock"></span></div>
                                <input name="currentPassword" type="password" id="currentPassword" class="form-control form-control-lg passInp" placeholder="Current Password">
                            </div>
                            <small class="text-danger"><?php echo form_error('currentPassword') ?></small>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">New Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><span class="fa fa fa-lock"></span></div>
                                <input name="newPassword" type="password" id="newPassword" class="form-control form-control-lg passInp" placeholder="New Password">
                            </div>
                            <small class="text-danger"><?php echo form_error('newPassword') ?></small>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><span class="fa fa fa-lock"></span></div>
                                <input name="confirmPassword" type="password" id="confirmPassword" class="form-control form-control-lg passInp" placeholder="Confirm Password">
                            </div>
                            <small class="text-danger"><?php echo form_error('confirmPassword') ?></small>
                        </div>

                        <!-- Checkbox -->
                        <div class="mb-3">
                            <div class="form-switch">
                                <input type="checkbox" class="form-check-input border border-1 border-dark" onclick="showAllPass(this)"> Show All Password
                            </div>                        
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-success btn-lg btn-block w-100"><i class="fa fa-refresh">&nbsp;Update</i></button> 
                        </div>    
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div><br>
</div>