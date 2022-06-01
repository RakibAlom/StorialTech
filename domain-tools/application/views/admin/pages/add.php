<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Add Page</span>
    </h1>
    <span class="mb-3">Create a New Page for your Website</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="mt-3 card">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3 row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label class="form-label <?php echo_if('text-danger', form_error('title')); ?>" for="title">Page Title <span class="text-danger">*</span></label>
                            <?php echo form_error( 'title', '<small class="text-danger float-end">', '</small>' ) ?>
                            <input class="form-control <?php echo_if('is-invalid', form_error('title')); ?>" type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" placeholder="Choose A Page Title" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label class="form-label <?php echo_if('text-danger', form_error('permalink')); ?>" for="email">Permalink</label>
                            <?php echo form_error( 'permalink', '<small class="text-danger float-end">', '</small>' ) ?>
                            <input class="form-control <?php echo_if('is-invalid', form_error('permalink')); ?>" type="text" name="permalink" id="permalink" value="<?php echo set_value('permalink'); ?>" placeholder="Choose A Page Slug" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('body')); ?>" for="body">Page Content <span class="text-danger">*</span></label>
                        <?php echo form_error( 'body', '<small class="text-danger float-end">', '</small>' ) ?>
                        <textarea rows="8" class="form-control <?php echo_if('is-invalid', form_error('body')); ?>" name="body" id="body" placeholder="Enter the Page Content"><?php echo set_value('body'); ?></textarea>
                        <small class="mt-2 text-muted d-block">Use the Editor to compose your page, or you may use HTML.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('placement')); ?>" for="placement">Placement <span class="text-danger">*</span></label>
                        <?php echo form_error( 'placement', '<small class="text-danger float-end">', '</small>' ) ?>
                        <select  class="form-control <?php echo_if('is-invalid', form_error('placement')); ?>" name="placement" id="placement">
                            <option value="header">Header</option>
                            <option value="footer">Footer</option>
                            <option value="both">Both</option>
                        </select>
                        <small class="mt-2 text-muted d-block">Choose the Placement of this Page Link.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('status')); ?>" for="status">Status</label>
                        <?php echo form_error( 'status', '<small class="text-danger float-end">', '</small>' ) ?>
                        <div class="form-check form-switch form-switch-md float-end">
                            <input id="status" class="form-check-input" checked name="status" type="checkbox">
                        </div>
                        <small class="text-muted d-block">Whether to Enable or Disable this page.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="submit" value="true" />
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    <a href="<?php echo admin_base_url('pages') ?>" class="btn btn-danger btn-lg">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>