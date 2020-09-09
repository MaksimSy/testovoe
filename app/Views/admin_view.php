  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <?php echo "<center><h3>".$_SESSION['mess']."</h3></center>"; ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th><center>Номер</center></th>
              <th><center>Пользователь</center></th>
              <th><center>Email</center></th>
              <th><center>Текст</center></th>
              <th><center>Статус</center></th>
            </tr>
          </thead>
          <tbody class="">
            <tr>
              <?php
                Controller_Admin::show_TasksEdit();
              ?>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-2">
        <center>
          <div class="btn btn-group btn-group-sm">
            <form method="post" action="/admin/logout">
                <input class="btn btn-info" type="submit" name="logout" value="Выйти">
            </form>
          </div>
        </center>
      </div>
    </div>
  </div>