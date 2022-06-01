<div class="container-fluid p-0">
    <h1 class="h3">
        <span class="ml-2">Update</span>
    </h1>
    <span class="mb-3">Update your website to a newer version of the script.</span>

    <?php
        $this->load->admin_view('widgets/alert');
    ?>

    <div class="card mt-3 theme-card">
        <?php if($update) { ?>
            <div class="card-header">
                <h3>An update is ready to be performed!</h3>

                <p>Please note that if you have made changes to any Core Files. You will lose them after the update.</p>

                <a href="<?php echo admin_base_url('update/perform') ?>" class="btn btn-success btn-lg">Update</a>
            </div>
        <?php } else { ?>
            <div class="card-header">
                <h3>No Update files uploaded.</h3>

                <p>You need to upload the <code>upload.zip</code> file to the root directory of your website before accessing this page.</p>
            </div>
        <?php } ?>
    </div>
</div>