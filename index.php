<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
?>




<div class="content">
    <div class="p-3 m-0 border-0 bd-example bd-example-row">
        <div class="row mb-2">
            <h3>Останні новини та оновлення</h3>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <h3>5 найкращих постів за версією користувачів</h3>
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2 style="margin-top: 150px;">Change the background</h2>
                    <p>Swap the background-color utility and add a `.text-*` </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2 style="margin-top: 150px; ">Add borders</h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2 style="margin-top: 150px;">Change the background</h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2 style="margin-top: 150px;">Change the background</h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2 style="margin-top: 150px;">Change the background</h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. </p>
                </div>
            </div>
        </div>

    </div>
    <div>
        <h6>
            Геншин Импакт – это захватывающая ролевая игра, которая перенесет вас в уникальный и детально проработанный мир Тэйвата. Игроки смогут исследовать великолепные локации, выполнять увлекательные квесты и сражаться с могущественными боссами вместе со своими героями. Каждый персонаж обладает уникальными способностями и историей, которые помогут вам погрузиться в игровой мир и прожить свои приключения.
            <br><br>
            В Геншин Импакт вы найдете множество возможностей для развития своих персонажей, крафта и сбора различных предметов. Игрокам предоставляется полная свобода действий, и каждый игрок может создать свой уникальный путь в этом увлекательном мире.
            <br><br>
            Красивая графика и потрясающая музыкальная составляющая погрузят вас в атмосферу игры и не оставят равнодушными. Вам предстоит исследовать разнообразные локации – от
        </h6>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Досліджуй світ з нами!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrap-login100 p-t-50 p-b-90">
                    <form class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-51">
                            Увійти в систему
                        </span>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="text" name="username" placeholder="Email">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="password" name="pass" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Запам'ятати мене
                                </label>
                            </div>
                            <div>
                                <a href="#" class="txt1">
                                    <!-- @todo -->
                                    Забубили пароль?
                                </a>
                            </div>
                        </div>
                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn">
                                Увійти
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Досліджуй світ з нами!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrap-login100 p-t-50 p-b-90">
                    <form class="login100-form validate-form flex-sb flex-w">
                        <span class="login100-form-title p-b-51">
                            Реєстрація
                        </span>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="text" name="username" placeholder="Email">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="password" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn">
                                Зареєструватись
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>