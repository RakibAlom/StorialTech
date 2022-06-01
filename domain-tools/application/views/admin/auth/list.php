<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Accounts List</span>
    </h1>
    <span class="mb-3">List of all Administrator accounts on your website.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="d-none d-xl-table-cell">Username</th>
                    <th class="d-none d-xl-table-cell">E-Mail</th>
                    <th>Role</th>
                    <th class="d-none d-md-table-cell">Controls</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $account) { ?>
                <tr>
                    <td><?php echo $account['id'] ?></td>
                    <td class="d-none d-xl-table-cell"><?php echo $account['username']; ?></td>
                    <td class="d-none d-xl-table-cell"><?php echo $account['email']; ?></td>
                    <td>
                        <?php if($account['super']) { ?>
                            <span class="badge bg-success">Super Administrator</span>    
                        <?php } else { ?>
                            <span class="badge bg-primary">Administrator</span>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="<?php echo admin_base_url('auth/edit/' . $account['id']) ?>" class="btn btn-primary btn-sm"><i data-feather="edit-2"></i> Edit</a>
                        <a data-confirm="<?php echo admin_base_url('auth/delete/' . $account['id']); ?>" href="#" class="btn btn-danger btn-sm deleteButton"><i data-feather="x"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>