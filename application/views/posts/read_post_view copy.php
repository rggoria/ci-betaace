<div class="container">
    <?php if(!$post->post_id): ?>
        <?php redirect('Forums'); ?>
    <?php else: ?>
        <h3 class="mt-3">
            <span>Read Post</span>
            <a href="<?php echo site_url('Forums'); ?>" class="btn btn-danger float-end "><i class="fa fa-arrow-circle-left">&nbsp;Back</i></a>
        </h3>
        <div class="card w-100 mt-3 border-dark">
            <div class="card-header w-100 h6">
                <span>Posted By: <span class="card-title-text"><?= $post->user_username; ?></span></span>
                <span class="float-end">Created at: <span class="card-title-text"><?= date( 'F d', strtotime( $post->post_created ) ); ?></span></span>
            </div>
            <?php if($post->post_photo == 'NULL'): ?>
                <div class="card-body p-4 text-black">
                    <h1 class="display-4 fst-italic"><?= $post->post_title; ?></h1>
                    <p class="lead my-3"><?= $post->post_description; ?></p>
                </div>
            <?php else: ?>
                <center class="bg-dark">
                    <div class="bg-image h-50 w-25">
                        <img src="<?= base_url('uploads/images/'.$post->post_photo); ?>" class="img-fluid"/>
                    </div>
                </center>
                <div class="card-body p-4 text-black">
                    <h1 class="display-4 fst-italic"><?= $post->post_title; ?></h1>
                    <p class="lead my-3"><?= $post->post_description; ?></p>
                </div>
            <?php endif; ?>
        </div>
        <?= form_open('Forums/add_comment/'.$post->post_id);?>
        <!-- Textarea: Description-->
        <div class="form-group mt-3">
            <label class="control-labe h3 mb-3">Add Comment</label>
            <button class="btn btn-success float-end mb-3 w-25"><i class="fa fa-send">&nbsp;Send</i></button>
            <textarea name="addComment" class="form-control border-dark" rows="5" placeholder="What are your thoughts?" maxlength="255"><?php echo isset($_POST["addComment"]) ? $_POST["addComment"] : ''; ?></textarea>
            <small class="text-danger"><?php echo form_error('addComment') ?></small>        
        </div> 
        <?= form_close();?>     
        <h3 class="mt-3">
            Read Comments      
        </h3>
        <div class="w-100 mt-3 bg-transparent">
            <!-- Get comments from data -->
            <?php if(!empty($comments)): ?>
                <!-- Get comments details -->
                <?php foreach($comments as $comment): ?>
                    <div class="card mt-3 border-dark">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comment->user_username; ?><span class="float-end"><?= date( 'F d', strtotime( $comment->comment_created ) ); ?></span></h5>
                            <p class="card-text"><?= $comment->comment_description; ?></p>
                        </div>
                        <?php if($this->session->userdata('id') == $comment->user_id): ?>
                            <div class="card-footer">
                                <a href="<?= site_url('Forums/edit_comment/'.$comment->comment_id);?>" class="btn btn-warning">Edit comment</a>
                                <a href="<?= site_url('Forums/delete_comment/'.$comment->comment_id);?>" class="btn btn-danger float-end" onclick="return confirm('Are you sure to delete the comment')">Delete comment</a>
                            </div>
                        <?php elseif($this->session->userdata('status') == 'ADMIN'): ?>
                            <div class="card-footer">
                                <a href="<?= site_url('Forums/delete_comment/'.$comment->comment_id);?>" class="btn btn-danger float-end" onclick="return confirm('Are you sure to delete the comment')">Delete comment</a>
                            </div>
                        <?php else: ?>
                            <div class="card-footer pb-4"></div>
                        <?php endif; ?>                
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card mt-3">
                    <div class="card-body border-dark">
                        <h5 class="card-title">Be the first Commentor</h5>
                    </div>                    
                    <div class="card-footer pb-3">
                        Go to Add comment section and enter your comment
                    </div>                                 
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?> <br>
</div>