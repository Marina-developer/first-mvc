<?php
/** @var $model \app\models\User */
?>
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Login</h3>
                        <?php $form = \app\Core\Form\Form::begin('', 'post') ?>
                        <div class="form-outline mb-4">
                            <?php echo $form->field($model, 'email') ?>
                        </div>

                        <div class="form-outline mb-4">
                            <?php echo $form->field($model, 'password')->passwordField() ?>
                        </div>

                        <!-- Checkbox -->
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        <hr class="my-4">
                        <?php \app\Core\Form\Form::end() ?>
                        <p class="small fw-bold mt-2 pt-1 mb-0">I don't have an account? <a href="/Register" class="link-danger">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
