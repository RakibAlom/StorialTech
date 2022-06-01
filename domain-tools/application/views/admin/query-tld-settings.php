<div class="container-fluid p-0">
    <h1 class="h3">
        <!-- <i class="align-middle" data-feather="<?php echo $this->options->current['icon'] ?>"></i> -->
        <span class="ml-2"><?php echo $this->options->current['title']; ?></span>
    </h1>
    <span class="mb-3"><?php echo $this->options->current['description'] ?></span>

    <?php
        if( $this->options->validation->status() != 'blank' ) {
            $this->load->admin_view('widgets/alert', [
                'alert' => [
                    'type'    => $this->options->validation->status() == 'success' ? 'success' : 'error',
                    'message' => $this->options->validation->status() == 'success' ? 'Settings updated successfully' : 'There were some errors in your form.' 
                ]
            ]);
        } else {
            $this->load->admin_view('widgets/alert');
        }
    ?>

    <div class="card mt-3">
        <div class="card-body">
            <?php $this->options->render_form(); ?>
        </div>
    </div>

    <h1 class="h3">Change Global Affiliate Link</h1>
    <span class="mb-3">Modify the Affiliate Link for all TLDs at Once.</span>

    <div class="card mt-3">
        <div class="card-body">
            <form x-data x-ref="form" method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <div class="alert alert-warning"><strong>Warning: </strong> This action cannot be reversed. It will change the affiliate link across <strong>ALL TLDs</strong> on your website.</div>
                        <label class="form-label <?php echo_if('text-danger', form_error('affiliate_link')); ?>" for="affiliate_link">Affiliate Link <span class="text-danger">*</span></label>
                        <?php echo form_error( 'affiliate_link', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('affiliate_link')); ?>" type="text" name="affiliate_link" id="affiliate_link" placeholder="Enter the Affiliate Link for all TLDs." />
                        <small class="mt-2 text-muted d-block">Example: <strong>https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12</strong>. The <strong>{{domain_name}}</strong> wildcard should be added where the domain-name is supposed to appear in the link.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="affiliate-link-submit" value="true" />
                    <button @click="$event.preventDefault(); if(confirm('Are you sure you want to replace the Affiliate Link for ALL TLDs?')) $refs.form.submit()" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <h1 class="h3">Query Whois Server</h1>
    <span class="mb-3">Check the response from any Whois Server. You may use this to find patterns.</span>

    <div class="card mt-3">
        <div class="card-body">
        <form method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('server')); ?>" for="server">WHOIS Server <span class="text-danger">*</span></label>
                        <?php echo form_error( 'server', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('server')); ?>" type="text" name="server" id="server" value="<?php echo set_value('server'); ?>" placeholder="Enter a WHOIS Server" />
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('domain')); ?>" for="domain">Domain <span class="text-danger">*</span></label>
                        <?php echo form_error( 'domain', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('domain')); ?>" type="text" name="domain" id="domain" value="<?php echo set_value('domain'); ?>" placeholder="Domain Name to Test" />
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="query-whois-submit" value="true" />
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>

            <?php if($whois_result) { ?>
                <pre style="border: 1px solid #ced4da; padding: 10px 15px; border-radius: 4px; background: #e8e8e8;" class="mt-3"><?php echo $whois_result ?></pre>
            <?php } ?>
        </div>
    </div>
</div>