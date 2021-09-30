<?php

use app\Core\Application;

?>
<section class="vh-100" style="background-color: #fff;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 fs-2 fw-medium">Welcome</p>
                                <?php if (Application::isGuest()): ?>
                                    <?php $form = \app\Core\Form\Form::begin('', 'post') ?>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <a class="btn btn-primary btn-lg fs-4 fw-medium" href="/login">Login</a>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <a class="btn btn-primary btn-lg fs-4 fw-medium" href="/login">Register</a>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">

                                        <a class="btn btn-danger btn-lg fs-4 fw-medium" href="/profile">Go to
                                            profile <?php echo \app\Core\Application::$app->user->getDisplayName() ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php \app\Core\Form\Form::end() ?>
                            </div>
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="https://image.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg"
                                     class="img-fluid"
                                     alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



