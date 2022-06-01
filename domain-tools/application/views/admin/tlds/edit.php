<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Edit TLD</span>
    </h1>
    <span class="mb-3">Configure this Tld Item</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="mt-3 card">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('tld')); ?>" for="title">TLD <span class="text-danger">*</span></label>
                        <?php echo form_error( 'tld', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('tld')); ?>" type="text" name="tld" id="tld" value="<?php echo set_value('tld', $tld['tld']); ?>" placeholder="Enter the Domain Extension" />
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('server')); ?>" for="email">WHOIS Server <span class="text-danger">*</span></label>
                        <?php echo form_error( 'server', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('server')); ?>" type="text" name="server" id="server" value="<?php echo set_value('server', $tld['whois_server']); ?>" placeholder="The WHOIS server for this TLD" />
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('pattern')); ?>" for="pattern">Pattern to Match <span class="text-danger">*</span></label>
                        <?php echo form_error( 'pattern', '<small class="text-danger float-end">', '</small>' ) ?>
                        <textarea rows="3" class="form-control <?php echo_if('is-invalid', form_error('pattern')); ?>" name="pattern" id="pattern" placeholder="Enter the NOT FOUND pattern for this TLD"><?php echo set_value('pattern', $tld['pattern']); ?></textarea>
                        <small class="mt-2 text-muted d-block">This is the <strong class="text-danger">NOT FOUND</strong> pattern. If this pattern is found in the result, this means that the domain is available.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('affiliate_link')); ?>" for="affiliate_link">Affiliate Link <span class="text-danger">*</span></label>
                        <?php echo form_error( 'affiliate_link', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('affiliate_link')); ?>" type="text" name="affiliate_link" id="affiliate_link" value="<?php echo set_value('affiliate_link', $tld['affiliate_link']); ?>" placeholder="Your Affiliate Link for this Domain." />
                        <small class="mt-2 text-muted d-block">This <strong>{{domain_name}}</strong> wildcard should be added where the domain-name is supposed to appear in the link.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('price')); ?>" for="price">Price (USD) <span class="text-danger">*</span></label>
                        <?php echo form_error( 'price', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('price')); ?>" type="number" name="price" id="price" value="<?php echo set_value('price', $tld['price']); ?>" placeholder="Price in USD" />
                        <small class="mt-2 text-muted d-block">If <strong>ExchangeRateAPI</strong> is enabled, this price will automatically be converted to the user's preference.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('is_main')); ?>" for="status">Main TLD</label>
                        <?php echo form_error( 'is_main', '<small class="text-danger float-end">', '</small>' ) ?>
                        <div class="form-check form-switch form-switch-md float-end">
                            <input <?php echo_if("checked disabled", $tld['is_main']); ?> id="is_main" class="form-check-input" name="is_main" type="checkbox">
                        </div>
                        <small class="text-muted d-block">Whether this is the Main TLD or Not.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('status')); ?>" for="status">Status</label>
                        <?php echo form_error( 'status', '<small class="text-danger float-end">', '</small>' ) ?>
                        <div class="form-check form-switch form-switch-md float-end">
                            <input <?php echo_if("checked", $tld['status']); ?> id="status" class="form-check-input" checked name="status" type="checkbox">
                        </div>
                        <small class="text-muted d-block">Whether to Enable or Disable this TLD.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="submit" value="true" />
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    <a href="<?php echo admin_base_url('tlds') ?>" class="btn btn-danger btn-lg">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>