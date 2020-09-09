
<div class="container">
	<div class="row">
		<div class="col-sm"></div>
		<div class="col-sm">
			<span class="label">Создать новую запись</span>
			<?php echo "<center><h3>".$_SESSION['result']."</h3></center>"; ?>
			<div class="form-group">
				<form action="create/created" method="post">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">Имя</span>
  						</div>
  						<input class="form-control" type="text" value="" name="name">
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">Email</span>
  						</div>
  						<input class="form-control" type="text" value="" name="email">
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">Текст</span>
  						</div>
  						<textarea class="form-control" name="text"></textarea>
					</div>
					<input class="form-control btn btn-success" type="submit" name="submit" value="Добавить" />
				</form>
					<a class="form-control btn btn-info" href="/" name="submit">Назад</a>
			</div>
		</div>
		<div class="col-sm"></div>
	</div>
</div>




			