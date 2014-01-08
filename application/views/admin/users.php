<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Users <small> <?=anchor('admin/form_users', 'Add new', array('class' => 'btn btn-sm btn-default'))?> </small></h1>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            
            <?php if(isset($message)) : ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('info')) : ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?=$this->session->flashdata('info')?>
            </div>
            <?php endif; ?>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Firstname</th><th>Lastname</th><th>Email</th><th>Groups</th><th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->first_name; ?></td>
                            <td><?php echo $user->last_name; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td>
                                <?php foreach ($user->groups as $group): ?>
                                    <?php echo anchor("auth/edit_group/" . $group->id, $group->name); ?><br />
                                <?php endforeach ?>
                            </td>
                            <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, 'deactive') : anchor("auth/activate/" . $user->id, 'activate'); ?></td>
                            <td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="col-lg-4">
            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div><!-- /.row -->

</div><!-- /#user-wrapper -->