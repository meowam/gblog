<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:black;">Досліджуй світ з нами!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrap-login100 p-t-50 p-b-90">
                    <form id="login-form" class="login100-form validate-form flex-sb flex-w" action="/configs/login.php" method="POST">
                        <span class="login100-form-title p-b-51">
                            Увійти в систему
                        </span>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Обов'язкове поле">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-24">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Запам'ятати мене
                                </label>
                            </div>
                        </div>
                        <div class="container-login100-form-btn m-t-17">
                            <button class="login100-form-btn" type="submit" value="submit">
                                Увійти
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>