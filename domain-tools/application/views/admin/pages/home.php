<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Pages</span>
    </h1>
    <span class="mb-3">List of all Pages on your website.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="d-flex justify-content-end">
        <a href="<?php echo admin_base_url('pages/add') ?>" class="btn btn-primary"><i data-feather="plus"></i> Add Page</a>
    </div>

    <div class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Permalink</th>
                    <th>Placement</th>
                    <th>Status</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody id="sortable-list">
                <?php if(count($pages)) { foreach($pages as $page) { ?>
                <tr data-id="<?php echo $page['id'] ?>" class="page-sortable">
                    <td><?php echo $page['id'] ?></td>
                    <td><?php echo $page['title']; ?></td>
                    <td><?php echo $page['permalink']; ?></td>
                    <td>
                        <?php if($page['placement'] == 'header') { ?>
                            <span class="badge bg-success">Header</span>    
                        <?php } else if($page['placement'] == 'footer') { ?>
                            <span class="badge bg-primary">Footer</span>
                        <?php } else { ?>
                            <span class="badge bg-info">Both</span>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($page['status']) { ?>
                            <span class="badge bg-success">Active</span>    
                        <?php } else { ?>
                            <span class="badge bg-primary">Disabled</span>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="<?php echo admin_base_url('pages/edit/' . $page['id']) ?>" class="btn btn-primary btn-sm"><i data-feather="edit-2"></i> Edit</a>
                        <a data-confirm="<?php echo admin_base_url('pages/delete/' . $page['id']); ?>" href="#" class="btn btn-danger btn-sm deleteButton"><i data-feather="x"></i></a>
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