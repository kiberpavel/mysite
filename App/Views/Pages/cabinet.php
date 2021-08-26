<main>
		<p class="title-name">Личный кабинет</p>
		<section class="main-autoriz container">
				<section>
						<p class="cabinet-name">Данные</p>
								<div class="wrap-cabinet">
										<p class="wrap-cabinet__text">Имя:</p>
										<p><?= $user['firstName']?></p>
								</div>
								<div class="wrap-cabinet">
										<p class="wrap-cabinet__text">Фамилия:</p>
										<p><?= $user['secondName']?></p>
								</div>
								<div class="wrap-cabinet">
										<p class="wrap-cabinet__text">Логин:</p>
										<p><?= $user['login']?></p>
								</div>
								<div class="wrap-cabinet">
										<p class="wrap-cabinet__text">Email:</p>
										<p><?= $user['email']?></p>
								</div>
						<form>
								<div class="input-wrap button-wrap">
										<a href="/logout" class="button cabinet-button-width"><p>Выход</p></a>
								</div>
						</form>
				</section>
				<section class="wrap-edit">
						<p class="cabinet-name">Изменение пароля</p>
						<form action="#" method="post">
								<div class="input-wrap">
										<input type="password" placeholder="Введите пароль" name="password" class="input" >
								</div>
								<div class="input-wrap button-wrap">
										<button>Изменить пароль</button>
								</div>
						</form>
				</section>
		</section>

</main>
