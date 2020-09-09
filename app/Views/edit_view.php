
<div class="container">
	<div class="row">
		<div class="col-sm"></div>
		<div class="col-sm">
			<span class="label">Редактирование</span>
			<div class="form-group">
		<?php $arr = Controller_Edit::edit($data);	?>
		<form action="<?php echo $data; ?>/save" method="post">
				<input class="form-control" type="text" value="<?php echo $arr['text']; ?>" name="text">
				<input type="hidden" name="checkText" value="<?php echo $arr['text'];?>">
			   	<span class="label">Выполнено</span>
			    <input class="" type="checkbox" name="change_status" value="1" checked />
			    <input class="form-control btn btn-success" type="submit" name="submit" value="Сохранить" />
			    <a class="form-control btn btn-info" href="/admin" name="submit">Назад</a>
		</form>

			</div>
		</div>
		<div class="col-sm"></div>
	</div>
</div>




			