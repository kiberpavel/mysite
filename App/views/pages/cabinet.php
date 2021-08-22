<main>
		<p class="title-name">Личный кабинет</p>
		<section class="main-autoriz container">
				<section>
						<p class="cabinet-name">Данные</p>
						<form>
								<div class="input-wrap">
										<p class="cabinet-text"><?= $user['firstName']?></p>
								</div>
								<div class="input-wrap">
										<p class="cabinet-text"><?= $user['secondName']?></p>
								</div>
								<div class="input-wrap">
										<p class="cabinet-text"><?= $user['login']?></p>
								</div>
								<div class="input-wrap">
										<p class="cabinet-text"><?= $user['email']?></p>
								</div>
								<div class="input-wrap button-wrap">
										<button><a href="/logout">Выход</a></button>
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
