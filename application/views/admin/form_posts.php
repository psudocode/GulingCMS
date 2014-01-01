<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Posts <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Visit <a class="alert-link" target="_blank" href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a> for more information.
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-8">
            
        <?php if (isset($error)) { echo $error; }?>
            <form role="form" method="post" id="form-post" enctype="multipart/form-data" action="<?= base_url('admin/add_post') ?>" >

                <div class="form-group">
                    <label>Title Post</label>
                    <input name="title-post" class="form-control" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label>Content (Body)</label>
                    <textarea class="form-control tiny" name="content" id="contents" rows="10"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="images">
                </div>
                
                <div class="form-group">
                    <label>Categories</label>
                    <input name="categories" class="form-control" placeholder="Enter Categories">
                    <p class="help-block">Separate with commas.</p>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <input name="tags" class="form-control" placeholder="Enter Tags">
                    <p class="help-block">Separate with commas.</p>
                </div>

                <button type="submit" name="submit" class="btn btn-default">Publish</button>

            </form>

        </div>
        <div class="col-lg-4">


            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->