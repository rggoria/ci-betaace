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
                    <?= form_open_multipart('Login/login_validation');?>                    
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <span class="h1 fw-bold mb-0 w-100">Log In</span>
                            <a href="<?php echo site_url('Forums'); ?>" class="btn btn-danger float-end w-25"><i class="fa fa-arrow-circle-left">&nbsp;Back</i></a>
                        </div>
                        <?php if(isset($error)):?>
                        <div class="form-group">
                            <div class="alert alert-danger text-dark text-center">
                            <h4><?= $error; ?></h4>
                            </div>
                        </div>
                        <?php endif;?>
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">Username</label>
                            <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input name="username" type="text" class="form-control form-control-lg" placeholder="Username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
                            </div>
                            <small class="text-danger"><?php echo form_error('username') ?></small>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <label class="col-md-4 mb-1 control-label">Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><span class="fa fa fa-lock"></span></div>
                                <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                            </div>
                            <small class="text-danger"><?php echo form_error('password') ?></small>
                        </div>
                        
                        <!-- Checkbox -->
                        <div class="form-switch mb-3">
                            <input type="checkbox" class="form-check-input border border-1 border-dark" onclick="showPass()"> Show Password
                        </div>

                        <div class="mt-lg-3 pt-lg-5 mb-lg-3"> 
                            <button class="btn btn-success btn-lg btn-block w-100">Login</button>
                        </div>

                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                        <p class="m-3 text-muted text-center p-lg-5">Don't have an account? <a href="<?= site_url('Signup'); ?>" class="text-primary">Signup here</a></p>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>