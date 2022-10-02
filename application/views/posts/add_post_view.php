<div class="container">
    <h3 class="mt-3">
        <span>Create a post</span>
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
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-text-tab" data-bs-toggle="pill" data-bs-target="#pills-text"  type="button" style="color: black;"><i class="fa fa-file-text-o">&nbsp;Text</i></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-photo-tab" data-bs-toggle="pill" data-bs-target="#pills-photo" type="button"  style="color: black;"><i class="fa fa-file-photo-o">&nbsp;Photo</i> </button>
            </li>                
        </ul>
        <div class="tab-content" id="pills-tabContent">       
                 
            <div class="tab-pane fade show active text" id="pills-text">
            <?= form_open('Forums/add_text_post_validation');?>
                <!-- Text input: Title-->
                <div class="pads">
                    <div class="form-group">
                        <input name="textPostTitle" type="text" class="form-control input-md" placeholder="Title" value="<?php echo isset($_POST["textPostTitle"]) ? $_POST["textPostTitle"] : ''; ?>" maxlength="25">                        
                        <small class="text-danger"><?php echo form_error('textPostTitle') ?></small>
                    </div>
                </div>
                <!-- Textarea: Description-->
                <div class="pads">
                    <div class="form-group">
                        <textarea name="textPostDescription" class="form-control" rows="5" placeholder="Description" maxlength="255"><?php echo isset($_POST["textPostDescription"]) ? $_POST["textPostDescription"] : ''; ?></textarea>
                        <small class="text-danger"><?php echo form_error('textPostDescription') ?></small> 
                    </div>
                </div>                 
                <hr class="m-3">
                <div class="text-end pads">                              
                    <button class="btn btn-success w-25">Post</button>    
                </div>
            <?= form_close();?>
            </div>
            
            
            <div class="tab-pane fade photo" id="pills-photo">
            <?= form_open_multipart('Forums/add_photo_post_validation');?>
                <!-- Text input: Title-->
                <div class="pads">
                    <div class="form-group">                        
                        <input name="photoPostTitle" type="text" class="form-control input-md" placeholder="Title" value="<?php echo isset($_POST["photoPostTitle"]) ? $_POST["photoPostTitle"] : ''; ?>" maxlength="25">                        
                        <small class="text-danger"><?php echo form_error('photoPostTitle') ?></small>
                    </div>
                </div>
                <!-- Textarea: Description-->
                <div class="pads">
                    <div class="form-group">                        
                        <textarea name="photoPostDescription" class="form-control" rows="5" placeholder="Description" maxlength="255"><?php echo isset($_POST["photoPostDescription"]) ? $_POST["photoPostDescription"] : ''; ?></textarea>
                        <small class="text-danger"><?php echo form_error('photoPostDescription') ?></small> 
                    </div>
                </div>
                <!-- File Upload: Photo-->
                <div class="pads">
                    <div class="form-group">
                        <input type="file" name="postPhoto" class="form-control">
                    </div>
                </div>
                <hr class="m-3">
                <div class="pads text-end">                              
                    <button class="btn btn-success w-25">Post</button>
                </div>
            <?= form_close();?>
            </div>
        </div>            
    </div>
    <br>
</div>