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
                    <?= form_open_multipart('Signup/signup_validation');?>
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <span class="h1 fw-bold mb-0 w-100">Sign Up</span>
                            <a href="<?php echo site_url('Forums'); ?>" class="btn btn-danger float-end w-25"><i class="fa fa-arrow-circle-left">&nbsp;Back</i></a>
                        </div>
                        <?php if(isset($success)):?>
                        <div class="form-group">
                            <div class="alert alert-success text-dark text-center">
                            <h4><?= $success; ?></h4>
                            </div>
                        </div>
                        <?php endif;?>
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter your account details</h5>
                        
                        <div class="form-outline row">
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Firstname</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa-user"></span></div>
                                    <input name="firstName" type="text" class="form-control form-control-lg" placeholder="Firstname" value="<?php echo isset($_POST["firstName"]) ? $_POST["firstName"] : ''; ?>">
                                </div>                                
                                <small class="text-danger"><?php echo form_error('firstName') ?></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Lastname</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa-user"></span></div>
                                    <input name="lastName" type="text" class="form-control form-control-lg" placeholder="Lastname" value="<?php echo isset($_POST["lastName"]) ? $_POST["lastName"] : ''; ?>">
                                </div>                                
                                <small class="text-danger"><?php echo form_error('lastName') ?></small>
                            </div>                           
                        </div>                        

                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">Username</label>
                            <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input name="username" type="text" class="form-control form-control-lg" placeholder="Username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
                            </div>
                            <small class="text-danger"><?php echo form_error('username') ?></small>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-text"><span class="fa fa fa-envelope"></div>
                                <input name="email" type="text" class="form-control form-control-lg" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                            </div>
                            <small class="text-danger"><?php echo form_error('email') ?></small>
                        </div>

                        <div class="form-outline row">
                            <div class="col-md-6 mb-4">
                                <label class="col-md-4 mb-1 control-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa fa-lock"></span></div>
                                    <input name="password" type="password" id="password" class="form-control form-control-lg passInp" placeholder="Password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                                </div>
                                <small class="text-danger"><?php echo form_error('password') ?></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="col-md-6 mb-1 control-label">Confirm-Password</label>
                                <div class="input-group">
                                    <div class="input-group-text"><span class="fa fa fa-lock"></span></div>
                                    <input name="confirmPassword" type="password" class="form-control form-control-lg passInp" placeholder="Confirm Password" value="<?php echo isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : ''; ?>">
                                </div>
                                <small class="text-danger"><?php echo form_error('confirmPassword') ?></small>
                            </div>                           
                        </div>

                        <!-- Checkbox -->
                        <div class="mb-3">
                            <div class="form-switch">
                                <input type="checkbox" class="form-check-input border border-1 border-dark" onclick="showAllPass(this)"> Show All Password
                            </div>                        
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-success btn-lg btn-block w-100">Register</button>
                        </div>

                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                        <p class="mt-lg-5 pb-lg-2 text-muted text-center">Already have an account? <a href="<?= site_url('Login'); ?>" class="text-primary">Login here</a></p>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>