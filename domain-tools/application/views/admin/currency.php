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
        }
    ?>

    <div class="card mt-3">
        <div class="card-body">
            <?php $this->options->render_form(); ?>
        </div>
    </div>

    <div class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Conversion Rate</th>
                    <th>Default</th>
                    <th>Enabled</th>
                </tr>
            </thead>
            <tbody x-data>
                <?php if(!$currencies) { ?>
                    <tr>
                    <td colspan="6">Currency Conversion is Not Enabled.</td>
                    </tr>
                <?php } else if(count($currencies)) { foreach($currencies as $code => $data) { ?>
                <tr>
                    <td><?php echo $code ?></td>
                    <td><?php echo $data['rate'] ?></td>
                    <td>
                        <div class="form-check form-switch form-switch-sm">
                            <input @change="$.post(admin_base_url + 'options/currencies', { action: 'default', symbol: '<?php echo $code ?>', status: $el.checked })" class="form-check-input" <?php echo_if('checked', $data['default']) ?> type="radio" name="main_tld" id="flexSwitchCheckDefault">
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-switch form-switch-sm">
                            <input @change="$.post(admin_base_url + 'options/currencies', { action: 'status', symbol: '<?php echo $code ?>', status: $el.checked })" class="form-check-input" <?php echo_if('checked', $data['enabled']) ?> type="checkbox" name="tld_status" id="flexSwitchCheckDefault">
                        </div>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="6">No Currencies Found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>