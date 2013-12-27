<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Pages <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-8">

            <form role="form" method="post" id="form-post" action="<?= base_url('admin/update_page/'.$post->id) ?>" >

                <div class="form-group">
                    <label>Title Post</label>
                    <input name="title-post" class="form-control" placeholder="Enter Title" value="<?=$post->title?>">
                </div>

                <div class="form-group">
                    <label>Content (Body)</label>
                    <textarea class="form-control tiny" name="content" id="contents" rows="10"><?=$post->content?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Images</label>
                    <input name="images" class="form-control" placeholder="Enter Categories" value="<?=$post->image_feature?>">
                </div>
                
                <div class="form-group">
                    <label>Add more categories</label>
                    <input name="categories" class="form-control" placeholder="Enter Categories">
                    <p class="help-block">Separate with commas.</p>
                </div>

                <div class="form-group">
                    <label>Add more tags</label>
                    <input name="tags" class="form-control" placeholder="Enter Tags">
                    <p class="help-block">Separate with commas.</p>
                </div>

                <button type="submit" name="submit" class="btn btn-default">Update</button>

            </form>

        </div>
        <div class="col-lg-4">


            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->