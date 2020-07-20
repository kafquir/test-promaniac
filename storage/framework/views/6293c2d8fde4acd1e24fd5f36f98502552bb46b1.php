<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
         <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    </head>
    <body>
        <div class="mainBody">
            <header class="mb-5">

                     <!-- Just an image -->
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo e(asset('images/logooriginal.png')); ?>" height="30" alt="">
                        </a>
                    </nav>


            </header>
            <main>
                <div class="container">
                    <!-- Form add new user  -->
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between">
                            <span>Ajouter un utilisateur</span>
                            <div class="d-flex align-items-center">
                                <span class="font-weight-bold text-dark-75">Progress</span>
                                <div class="progress  mx-3">
                                    <div class="progress-bar" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="font-weight-bolder text-dark">78%</span>
                            </div>
                        </div>
                        <div class="card-body">

                            <form onsubmit="return validateForm()" >

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Nom <sup>*</sup></label>
                                        <input type="text" class="form-control is-valid" id="name"  name="last_name" placeholder="Nom" required="">
                                        <div style="color:red"id="nameError"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="firstName">Prénom <sup>*</sup></label>
                                        <input type="text" class="form-control is-invalid" id="firstName" name="first_name" placeholder="Prénom" required="">
                                        <div style="color:red"id="firstNameError"></div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="phone">Tel <sup>*</sup></label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Téléphone"  required=""><div style="color:red" id="numloc"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="city">Ville</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Ville"  />
                                        <div id="cityError"></div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="gender" class="mr-5">Sexe </label>
                                        <div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="main" name="gender" class="custom-control-input"value="Homme">
                                                <label class="custom-control-label" for="main" >Homme</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="woman" name="gender" class="custom-control-input" value="Femme">
                                                <label class="custom-control-label" for="woman">Femme</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="email">Email <sup>*</sup></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                                        <div class="error" id="emailErr"></div>
                                        <div id="availability"></div>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="confirmEmail">Confirmer votre adresse mail <sup>*</sup></label>
                                        <input type="email" class="form-control" id="confirmEmail" name="email_verified_at" placeholder="Confirmer email" oncopy="return false" onpaste="return false">
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="password">Password <sup>*</sup></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                                        <div style="color:red"id="pwdError"></div>
                                </div>
                                <div class="f-flex justif">
                                    <button type="submit" id="submit"class="btn btn-primary">Soumettre</button>

                                </div>

                            </form>

                        </div>
                    </div>
                     <!-- End Form add new user  -->

                    <!-- board_content  -->
                    <div class="board_content">
                        <h3>Liste des utilisateurs</h3>
                        <div class="board">

                            <!-- column null -->
                            <div class="board-column">
                                <!-- title column -->
                                <div class="board-column-header">Null</div>

                                <!-- content item users -->
                                <div class="board-column-content">
                                    <!-- item user -->
                                    <div class="board-item">
                                        <div class="board-item-header d-flex justify-content-between">
                                            <span>
                                                Nom prénom
                                            </span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch1" checked>
                                                <label class="custom-control-label" for="switch1"></label>
                                            </div>
                                        </div>
                                        <div class="board-item-content">
                                            <p>Age: <span>Null</span></p>
                                        </div>
                                        <div class="board-item-event" data-target="#modalAge" data-toggle="modal"></div>
                                    </div>
                                    <div class="board-item disabled">
                                        <div class="board-item-header d-flex justify-content-between">
                                            <span>
                                                Nom prénom 3
                                            </span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch3" >
                                                <label class="custom-control-label" for="switch3"></label>
                                            </div>
                                        </div>
                                        <div class="board-item-content">
                                            <p>Age: <span>Null</span></p>
                                        </div>
                                        <div class="board-item-event" data-target="#modalAge" data-toggle="modal"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End column null -->

                            <!-- column -18 -->
                            <div class="board-column">
                                <div class="board-column-header">-18 ans</div>
                                <div class="board-column-content">
                                    <div class="board-item board-pink">
                                        <div class="board-item-header d-flex justify-content-between">
                                            <span>
                                                Nom prénom2
                                            </span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switc2" checked>
                                                <label class="custom-control-label" for="switch2"></label>
                                            </div>
                                        </div>
                                        <div class="board-item-content">
                                            <p>Age: <span>15</span>ans</p>
                                        </div>
                                        <div class="board-item-event" data-target="#modalAge" data-toggle="modal"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- End column -18 -->


                            <!-- column between 18 and 25 -->
                            <div class="board-column">
                                <div class="board-column-header">entre 18 ans et 25 ans</div>

                                <div class="board-column-content">

                                </div>
                            </div>
                            <!-- End column between 18 and 25 -->


                            <!-- column between +25  -->
                            <div class="board-column">
                                <div class="board-column-header">+25 ans</div>
                                <div class="board-column-content">

                                </div>
                            </div>
                            <!-- column between +25  -->

                        </div>
                    </div>
                    <!-- End board_content  -->
                </div>
            </main>


            <!-- modal update age  -->
            <div class="modal" id="modalAge" tabindex="-1" role="dialog" aria-hidden="true" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h3 class="my-0">Nom prénom</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body default-modal"  >

                            <div class="info_user" id="info">
                                <dl>
                                    <dt>Nom</dt>
                                    <dd>Nom prénom</dd>
                                </dl>
                                <dl>
                                    <dt>Téléphone</dt>
                                    <dd>0612 36 59 95</dd>
                                </dl>
                                <dl>
                                    <dt>Email</dt>
                                    <dd>example@email.com</dd>
                                </dl>
                                <dl>
                                    <dt>Ville</dt>
                                    <dd>Agadir</dd>

                                </dl>
                            </div>
                            <div  class="age_user">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row align-items-center">
                                                <label class="col-md-2" for="name">Age </label>
                                                <div class="form-group col-md-5 mb-0">
                                                    <input type="number" class="form-control" id="age"  name="age" placeholder="Age" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>" ></script>
          <script type="text/javascript" src="<?php echo e(asset('js/script.js')); ?>" ></script>

    </body>
</html>
<?php /**PATH C:\laragon\www\test2\resources\views/welcome.blade.php ENDPATH**/ ?>
<?php /**PATH C:\xampp\htdocs\test\resources\views/welcome.blade.php ENDPATH**/ ?>