<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">TLDs</span>
    </h1>
    <span class="mb-3">List of all TLDs on your website.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="d-flex justify-content-end">
        <a href="<?php echo admin_base_url('tlds/add') ?>" class="mr-2 btn btn-primary"><i data-feather="plus"></i> Add TLD</a>
    </div>

    <div x-data="window.bitflan.components.tlds_component()" class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Extension</th>
                    <th>WHOIS Server</th>
                    <th>Price</th>
                    <th>Is Main</th>
                    <th>Status</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody id="sortable-list">
                <?php if(count($tlds)) { foreach($tlds as $tld) { ?>
                <tr data-id="<?php echo $tld['id'] ?>" class="tld-sortable">
                    <td><?php echo $tld['id'] ?></td>
                    <td><?php echo $tld['tld']; ?></td>
                    <td><?php echo $tld['whois_server']; ?></td>
                    <td>
                        <span><?php echo $tld['price'] ?> USD</span>
                    </td>
                    <td>
                        <div class="form-check form-switch form-switch-sm">
                            <input class="form-check-input" type="radio" @change="updateMainStatus('<?php echo $tld['id'] ?>')" value="<?php echo $tld['id'] ?>" <?php if($tld['is_main']) { echo 'checked'; } ?> name="main_tld" id="flexSwitchCheckDefault">
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-switch form-switch-sm">
                            <input class="form-check-input" type="checkbox" @change="updateStatus('<?php echo $tld['id'] ?>')" value="<?php echo $tld['id'] ?>" <?php if($tld['status']) { echo 'checked'; } ?> name="tld_status" id="flexSwitchCheckDefault">
                        </div>
                    </td>
                    <td>
                        <a href="<?php echo admin_base_url('tlds/edit/' . $tld['id']) ?>" class="btn btn-primary btn-sm"><i data-feather="edit-2"></i> Edit</a>
                        <a data-confirm="<?php echo admin_base_url('tlds/delete/' . $tld['id']); ?>" href="#" class="btn btn-danger btn-sm deleteButton">Delete</a>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="6">No Pages Found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>