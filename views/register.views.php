<?php
  use app\core\Form;
?>

<h1>Register</h1>
<?php $form = Form::begin("", "post") ?>
<?php // the attribute names for this fields should be the same as in the related model ?>
<?php echo $form->field($model, "username"); ?>
<?php echo $form->field($model, "email"); ?>
<div class="row">
  <div class="col">
    <?php echo $form->field($model, "password")->passwordField(); ?>
  </div>
  <div class="col">
    <?php echo $form->field($model, "confirmpassword")->passwordField(); ?>
  </div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>
