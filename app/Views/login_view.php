<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div>
                    <h3 class="">Войти</h3>
                    <br>
                    <form method="POST" action="">     
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name" name="name"
                                placeholder="Name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                placeholder="пароль">
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" value="Войти"></input>
                        <div class="btn btn-info"><a class='nohover' href="/">Вернуться</a></div>
                    </form>
                    <?php extract($data);?>
                    <?php if($login_status=="succsess") { ?>
                        <div class="alert alert-success">Добро пожаловать.</div>
                    <?php } elseif($login_status=="error") { ?>
                        <div class="alert alert-danger">Логин или пароль введены неверно.</div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
</div>