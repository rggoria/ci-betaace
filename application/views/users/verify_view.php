<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <h3 class="mt-3">
        <span>Email Validation</span>
    </h3>
    <hr>
    <div class="card mt-3 text-center border-dark border-3">   
        <div class="card-header bg-success">
            <h5 style="color: white;">Thank you for signing up to our website!</h5>
        </div>
        <div class="card-body">
            <i class="fa fa-check-circle fa-5x text-success"></i>
            <h5 class="card-title"><span class="text-success">Thank you!</span> You're one step ahead!</h5>
            <p class="card-text">
                For now you're account is <span class="text-danger">INACTIVE</span>
                to activate you're account you need to check your <strong>email inbox</strong> or <strong>spam inbox</strong> with the given
                activation link to make your account active.
            </p>
            <a href="<?php echo site_url('Forums'); ?>" class="btn btn-success">Return to Homepage</a>
        </div>
        <div class="card-footer text-muted"></div>                 
    </div>
    <br>
</div>