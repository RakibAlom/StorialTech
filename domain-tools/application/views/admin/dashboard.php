<div class="container-fluid p-0">
    <h1 class="h3 mt-3">
        <span class="ml-2">Dashboard</span>
    </h1>
    <span class="mb-3">Welcome to the Administration Panel.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="row mt-3">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Domain TLDS</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="link-2"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?php echo count($tlds); ?></h1>
                    <div class="mb-0">
                        <span class="text-muted">Number of TLDS on your Website</span>
                        <a href="<?php echo admin_base_url('tlds') ?>" class="btn btn-sm btn-primary float-end">Manage</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Pages</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?php echo count($pages); ?></h1>
                    <div class="mb-0">
                        <span class="text-muted">Amount of Pages added</span>
                        <a href="<?php echo admin_base_url('pages') ?>" class="btn btn-sm btn-primary float-end">Manage</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Admin Users</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?php echo count($admins); ?></h1>
                    <div class="mb-0">
                        <span class="text-muted">Number of Administrators</span>
                        <a href="<?php echo admin_base_url('auth') ?>" class="btn btn-sm btn-primary float-end">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="h3 mt-3">
        <span class="ml-2">Website Information</span>
    </h1>
    <span class="mb-3">Some statistics and information about your website.</span>

    <div class="row mt-3">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Install Information</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="settings"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3"><span style="font-size: 15px; position: relative; bottom: 5px;" class="badge bg-success"><?php echo number_format(PRODUCT_VERSION, 1) ?></span> <?php echo PRODUCT_NAME ?></h1>
                    <div class="mb-0">
                        <span class="text-muted">Developed & Maintained by <?php echo VENDOR_NAME ?>. Thank you for purchasing our product.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Current Theme</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="droplet"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3"><span style="font-size: 15px; position: relative; bottom: 5px;" class="badge bg-success"><?php echo number_format($theme['version'], 1) ?></span> <?php echo $theme['name'] ?></h1>
                    <div class="mb-0">
                        <span class="text-muted">Made by <?php echo $theme['author'] ?></span>
                        <a href="<?php echo admin_base_url('options/themes') ?>" class="btn btn-sm btn-primary float-end">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card flex-fill mt-3">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Web Server</th>
                    <td><?php echo isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER["SERVER_SOFTWARE"] : 'Unknown'; ?>
                </tr>
                <tr>
                    <th>PHP Version</th>
                    <td><?php echo (float)phpversion(); ?>
                </tr>
                <tr>
                    <th>Base Website URL</th>
                    <td><?php echo base_url(); ?>
                </tr>
                <tr>
                    <th>Cookie Domain</th>
                    <td><?php echo $this->config->item('cookie_domain') ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>