<main>
        <p class="title-name">Регистрация</p>
        <section class="main-autoriz container">
                <section class="login-wrap">
                        <form action="#" method="post">
                                <div class="input-wrap">
                                        <input type="text" placeholder="Введите ваше имя" name="name" class="input" >
                                </div>
                                <div class="input-wrap">
                                        <input type="text" placeholder="Введите вашу фамилию" name="second_name"  class="input" >
                                </div>
                                <div class="input-wrap">
                                        <input type="text" placeholder="Введите ваш логин" name="login"  class="input" >
                                </div>
                                <div class="input-wrap">
                                        <input type="password" placeholder="Введите пароль" name="password"  class="input" >
                                </div>
                                <div class="input-wrap">
                                        <input type="email" placeholder="Введите вашу почту" name="email"  class="input" >
                                </div>
                                <div class="input-wrap button-wrap">
                                        <button type="submit" name="submit">Регистрация</button>
                                </div>
                        </form>
                </section>
                <section class="lumen-about">
                        <h1 class="main-title">Дизайнерские люстры от мировых брендов</h1>
                        <p class="info-main">Сделайте интерьер стильным и современным</p>
                </section>
        </section>
        <section>
            <?php if (empty($result)) : ?>
                <p>Вы успешно зарегестрированы!</p>
            <?php else : ?>
                    <?php if (isset($errors)) : ?>
                <ul>
                        <li> - <?=  $errors; ?></li>
                </ul>
                    <?php endif; ?>
            <?php endif; ?>
        </section>
</main>