<?php
/** @var $model \app\models\User */
$this->title = 'Add new user';
?>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
                     alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <?php $form = \app\Core\Form\Form::begin('', 'post') ?>
                <span><br></span>
                <h3 class="mb-5">Add new user</h3>
                <div class="form-outline mb-4">
                        <?php echo $form->field($model, 'username') ?>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <?php echo $form->field($model, 'email') ?>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <?php echo $form->field($model, 'password')->passwordField() ?>
                    </div>
                    <div class="form-outline mb-3">
                        <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
                    </div>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" id="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Add new user</button>

                    </div>

                <?php \app\Core\Form\Form::end() ?>
            </div>
        </div>
    </div>
</section>
