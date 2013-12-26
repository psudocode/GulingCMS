<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Posts <small> <?=anchor('admin/form_posts', 'Add new', array('class' => 'btn btn-sm btn-default'))?> </small></h1>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
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
                        <th>id</th><th>Title</th><th>Created at</th><th>Status</th><th>Author</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post) : ?>
                    <tr>
                        <td><?=$post->id?></td>
                        <td><?=$post->title?></td>
                        <td><?=$post->created_at->format('d M Y')?></td>
                        <td><?=$post->post_status?></td>
                        <td><?=User::find($post->created_by)->username?></td>
                        <td><?=anchor('admin/edit_post/'.$post->id, 'Edit', array('class' => 'btn btn-sm btn-default'))?>  
                            <?=anchor('admin/delete_post/'.$post->id, 'Delete', array('class' => 'btn btn-sm btn-warning'))?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="col-lg-4">
            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->