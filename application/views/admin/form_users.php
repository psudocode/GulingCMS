<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Users <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <?php if($message) : ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-8">
        <?php if (isset($error)) { echo $error; }?>
            <?php echo form_open("admin/form_users");?>

                <div class="form-group">
                    <label>First Name</label>
                    <?php echo form_input($first_name);?>
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <?php echo form_input($last_name);?>
                </div>
                
                <div class="form-group">
                    <label>Company</label>
                    <?php echo form_input($company);?>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <?php echo form_input($email);?>
                </div>
                
                <div class="form-group">
                    <label>Phone</label>
                    <?php echo form_input($phone);?>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <?php echo form_input($password);?>
                </div>
                
                <div class="form-group">
                    <label>Password Confirmation</label>
                    <?php echo form_input($password_confirm);?>
                </div>

                <button type="submit" name="submit" class="btn btn-default">Publish</button>

            </form>

        </div>
        <div class="col-lg-4">


            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div><!-- /.row -->

</div><!-- /#user-wrapper -->