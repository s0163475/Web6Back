<div class="form">
	<div class="form__header">
		<div class='form__container form__container_good'>
			<span class='form__span'>Данные отправленны!</span>
		</div>
		<div class='form__container'>
			<p class='form__p'>Можете <a href='login.php' class='form__a'>войти</a>:</p>
			<p class='form__p'>Логин: <strong><?php echo $_COOKIE['login'] ?></strong></p>
			<p class='form__p'>Пароль: <strong><?php echo $_COOKIE['password'] ?></strong></p>
		</div>
	</div>