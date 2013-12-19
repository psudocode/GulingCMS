<?php if($message) : ?>
<div id="infoMessage" style="width: 300px;margin: 0 auto; background-color: #eee;border-radius: 5px; padding: 10px; margin-top: 30px"><?php echo $message;?></div>
<?php endif; ?>
    <?php echo form_open("auth/login"); ?>
<div id="block">
    <?php echo form_label('p', 'identity',array('id' => 'user')); ?>
    <?php echo form_input($identity); ?>
    <?php echo form_label('k', 'identity',array('id' => 'pass')); ?>
    <?php echo form_input($password); ?>
    <?php echo form_submit(array('id' => 'submit', 'value' => 'a')); ?>
</div>
<?php echo form_close(); ?>