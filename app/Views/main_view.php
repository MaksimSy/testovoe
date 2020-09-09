  <div class="container">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-8">
        <table class="table table-striped">
  				<thead>
  					<tr>
  						<th><center>Пользователь</center></th>
  						<th><center>Email</center></th>
  						<th colspan="2"><center>Текст</center></th>
  						<th><center>Статус</center></th>
  					</tr>
  				</thead>
  				<tbody class="">
              <?php
                Controller_Main::show_Tasks();
              ?>
  				</tbody>
  			</table>
      </div>
      <div class="col-3">
        <center>
          <div class="btn btn-group btn-group-xs btn-block">
            <a class="nohover btn btn-success" href="create">Новая задача</a>
            <a class="nohover btn btn-info" href="login">Авторизация</a>
          </div>
          <form method="post" action="">
            <div class="btn btn-group btn-group-xs btn-block">
              <select class="form-control" name="order_by">
                <option value="author_name">По пользователю</option>
                <option value="email">По email</option>
                <option value="status">По статусу</option>
              </select>
            </div>
            <div class="btn btn-group btn-group-xs btn-block">
              <select class="form-control" name="ascendent">
                <option value="ASC">От меньшего к большему(ASC)</option>
                <option value="DESC">От большего к меньшему(DESC)</option>
              </select>
            </div>
            <div class="btn btn-group btn-group-xs btn-block">
              <input class="btn btn-dark btn-block" type="submit" name="submit" value="Отсортировать">
            </div>
          </form>
        </center>
      </div>
    </div>
  </div>