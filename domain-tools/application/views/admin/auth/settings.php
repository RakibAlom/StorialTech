<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Account Settings</span>
    </h1>
    <span class="mb-3">Change your account details</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="mt-3 card">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('username')); ?>" for="username">Username <span class="text-danger">*</span></label>
                        <?php echo form_error( 'username', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('username')); ?>" type="text" name="username" id="username" value="<?php echo set_value('username', $admin_user['username']); ?>" placeholder="Choose A New Username" />
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('email')); ?>" for="email">E-Mail <span class="text-danger">*</span></label>
                        <?php echo form_error( 'email', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('email')); ?>" type="email" name="email" id="email" value="<?php echo set_value('email', $admin_user['email']); ?>" placeholder="Choose A New E-Mail" />
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('password')); ?>" for="password">New Password</label>
                        <?php echo form_error( 'password', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('password')); ?>" type="password" name="password" id="password" placeholder="Choose A New Password" />
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Role </label>
                        <input disabled class="form-control" type="text" value="<?php echo $admin_user['super'] ? 'Super Administrator' : 'Administrator'; ?>" />
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="submit" value="true" />
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>