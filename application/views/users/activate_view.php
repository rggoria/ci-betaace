<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <h3 class="mt-3">
        <span>Email Validation</span>
    </h3>
    <hr>
    <div class="card mt-3 text-center border-dark border-3">   
        <div class="card-header bg-info">
            <h5>Activation Complete!</h5>
        </div>
        <div class="card-body">
            <i class="fa fa-thumbs-o-up fa-5x text-success"></i>
            <h5 class="card-title"><span class="text-success">Congratulation</span> You're account is now <span class="text-primary">ACTIVE</span>!</h5>
            <p class="card-text">
                You can now share the things you want to express on the homepage. Either it is simple or important you can share you're ideas.
            </p>
            <a href="<?php echo site_url('Login'); ?>" class="btn btn-primary">Go to Login</a>
        </div>
        <div class="card-footer text-muted"></div>                 
    </div>
    <br>
</div>