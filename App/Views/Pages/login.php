<main>
        <p class="title-name">Авторизация</p>
    <section class="main-autoriz container">
            <section class="login-wrap">
                    <form action="#" method="post">
                            <div class="input-wrap">
                                    <input type="text" placeholder="Введите логин" name="login" class="input" >
                            </div>
                            <div class="input-wrap">
                                    <input type="password" placeholder="Введите пароль" name="password"  class="input" >
                            </div>
                            <div class="input-wrap button-wrap">
                                    <a href="/registration" class="link">Регистрация</a>
                            </div>
                            <div class="input-wrap button-wrap">
                                    <button name="submit">Авторизация</button>
                            </div>
                    </form>
                    <section class="errors">
                    <?php if (isset($errors)) : ?>
                                    <ul>
                                            <li> - <?=  $errors; ?></li>
                                    </ul>
                    <?php endif; ?>
                    </section>
            </section>
            <section class="lumen-about">
                    <h1 class="main-title">Дизайнерские люстры от мировых брендов</h1>
                    <p class="info-main">Сделайте интерьер стильным и современным</p>
            </section>
    </section>
</main>