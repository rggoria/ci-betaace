<div class="container">
    <?php if(!$post->post_id): ?>
        <?php redirect('Forums'); ?>
    <?php else: ?>
        <h3 class="mt-3">
            <span>Edit post</span>
            <a href="<?php echo site_url('Forums'); ?>" class="btn btn-danger float-end"><i class="fa fa-arrow-circle-left">&nbsp;Back</i></a>
        </h3>
        <hr>
        <?php if(isset($error)):?>
        <div class="form-group">
            <div class="alert alert-danger text-dark text-center">
            <h4><?= $error; ?></h4>
            </div>
        </div>
        <?php endif;?>
        <div class="card mt-3 border-dark">
            <div class="card-header">
                Created By: <?= $post->user_username; ?>
            </div>            
            <?= form_open('Forums/edit_post_validation/'.$post->post_id);?>
                <!-- Text input: Title-->
                <div class="m-3">
                    <div class="form-group">
                        <label class="col-md-4 mb-1 control-label">Title</label>
                        <input name="textPostTitle" type="text" class="form-control input-md" placeholder="Title" value="<?= $post->post_title; ?>" maxlength="25">                        
                        <small class="text-danger"><?php echo form_error('textPostTitle') ?></small>
                    </div>
                </div>
                <?php if($post->post_photo == 'NULL'): ?>
                    <div class="m-3">
                        <div class="form-group">
                        <label class="col-md-4 mb-1 control-label">Description</label>
                            <textarea name="textPostDescription" class="form-control" rows="5" placeholder="Description" maxlength="255"><?= $post->post_description; ?></textarea>
                            <small class="text-danger"><?php echo form_error('textPostDescription') ?></small> 
                        </div>
                    </div>
                    <div class="card-footer text-end">                              
                        <button class="btn btn-success w-25"><i class="fa fa-refresh">&nbsp;Update</i></button>    
                    </div>
                <?php else: ?>
                    <center class="bg-dark">
                        <div class="bg-image h-50 w-25">
                            <img src="<?= base_url('uploads/images/'.$post->post_photo); ?>" class="img-fluid"/>
                        </div>
                    </center>
                    <!-- Textarea: Description-->
                    <div class="m-3">
                        <div class="form-group">
                        <label class="col-md-4 mb-1 control-label">Description</label>
                            <textarea name="textPostDescription" class="form-control" rows="5" placeholder="Description" maxlength="255"><?= $post->post_description; ?></textarea>
                            <small class="text-danger"><?php echo form_error('textPostDescription') ?></small> 
                        </div>
                    </div>
                    <div class="card-footer text-end">                              
                        <button class="btn btn-success w-25">Post</button>    
                    </div>
                <?php endif; ?>
            <?= form_close();?>            
        </div>
    <?php endif; ?>
    <br>
</div>