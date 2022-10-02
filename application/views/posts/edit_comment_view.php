<div class="container">
    <h3 class="mt-3">
        <span>Edit comment</span>
        <a href="<?php echo site_url('Forums/read_post/'.$comment->post_id); ?>" class="btn btn-danger float-end">Back</a>
    </h3>
    <hr>
    <?php if(isset($error)):?>
    <div class="form-group">
        <div class="alert alert-danger text-dark text-center">
        <h4><?= $error; ?></h4>
        </div>
    </div>
    <?php endif;?>
    <div class="card mt-3">
        <div class="card-header">
            Created By: <?= $comment->user_username; ?>
        </div>
        <?= form_open('Forums/edit_comment_validation/'.$comment->comment_id.'/'.$comment->post_id);?>   
            <div class="m-3">
                <div class="form-group">
                <label class="col-md-4 mb-1 control-label">Description</label>
                    <textarea name="textPostDescription" class="form-control" rows="5" placeholder="Description" maxlength="255"><?= $comment->comment_description; ?></textarea>
                    <small class="text-danger"><?php echo form_error('textPostDescription') ?></small> 
                </div>
            </div>
            <div class="card-footer text-end">                              
                <button class="btn btn-success w-25"><i class="fa fa-refresh">&nbsp;Update</i></button>
            </div>           
        <?= form_close();?>            
    </div>
</div>