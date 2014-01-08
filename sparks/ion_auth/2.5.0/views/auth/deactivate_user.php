<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1><?php echo lang('deactivate_heading'); ?></h1>
            <ol class="breadcrumb">
                <li><p><?php echo sprintf(lang('deactivate_subheading'), $user->username); ?></p></li>
            </ol>
            <?php if ($this->session->flashdata('info')) : ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= $this->session->flashdata('info') ?>
                </div>
            <?php endif; ?>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open("auth/deactivate/" . $user->id); ?>
            
            <div class="radio">
              <label>
                <input type="radio" name="confirm" id="optionsRadios1" value="yes" checked>
                Yes
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="confirm" id="optionsRadios2" value="no">
                No
              </label>
            </div>

            <?php echo form_hidden($csrf); ?>
            <?php echo form_hidden(array('id' => $user->id)); ?>

            <p><?php echo form_submit(array('type' => 'submit','value' => 'Submit','class' => 'btn btn-primary')); ?></p>

            <?php echo form_close(); ?>

        </div>
        <div class="col-lg-4">
            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div><!-- /.row -->

</div><!-- /#user-wrapper -->