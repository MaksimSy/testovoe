<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index($id)
	{
		
	}

	public static function get_user_data($name)
	{
		include 'db.php';
		$arr=[];
		$sql = mysqli_query($link, "SELECT * FROM `users`");
		while ($stroka = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
			$arr = array('name' => $name, 'password'=> $stroka['password']);
		}
		return $arr;
	}

	public static function pagination()
	{
		include 'db.php';
		$query="SELECT COUNT(*) FROM tasks";
		$res=mysqli_query($link, $query);
		$row=mysqli_fetch_row($res);
		$total_rows=$row[0];
		$per_page=3;
		$num_pages=ceil($total_rows/$per_page);

			echo "Страницы: ";
		for($i=1;$i<=$num_pages;$i++) {
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';
  			echo '<a href="'.$_SERVER['/'].''.$i*$per_page.'">'.$i."</a>";
  			echo '&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
		$start=abs($page*$per_page);
		$quantityArray= ['start'=> $start, 'per_page'=> $per_page, 'num_pages'=>$num_pages];
		return $quantityArray;

	}

	public static function show_Tasks()
	{
		include 'db.php';

		$quantityArray=Controller::pagination();
		$start = $quantityArray['start'];
		$per_page = $quantityArray['per_page'];
		$num_pages = $quantityArray['num_pages'];

		session_start();
		if (isset($_POST['submit'])) {		
			$_SESSION['order_by']=$_POST['order_by'];
			$_SESSION['ascendent']=$_POST['ascendent'];
		}elseif ($_SESSION['order_by']==NULL or $_SESSION['ascendent']==NULL) {
			$_SESSION['order_by']='id';
			$_SESSION['ascendent']='ASC';
		}

		$page = intval(Route::page());
		if ($page!==0) {
			$start = $page-$per_page;
		}

		$rows = mysqli_query($link, "SELECT * FROM `tasks` ORDER BY `tasks`.`".$_SESSION['order_by']."` ".$_SESSION['ascendent']." LIMIT ".$start.", ".$per_page."");	
		while ($stroka = mysqli_fetch_array($rows)) {
		echo "<tr>";
			echo "<td>".$stroka['author_name']."</td>";
			echo "<td colspan='1'>".$stroka['email']."</td>";
			echo "<td colspan='2'>".$stroka['text']."</td>";
			if ($stroka['status']!=0) {
				echo "<td>Выполнено</td>";
			}else{
				echo "<td>Не выполнено</td>";
			}
			if ($stroka['edit']!=0) {
				echo "<td class='alert alert-info'>Отредактировано администратором</td>";
			}
		echo "</tr>";
		}
		
	}

	public static function show_TasksEdit()
	{
		include 'db.php';

		$rows = mysqli_query($link, "SELECT * FROM `tasks`");	
		while ($stroka = mysqli_fetch_array($rows)) {
		echo "<tr>";
			echo "<td><a href='admin/edit/".$stroka['id']."'</a></td";
			echo "<td>".$stroka['id']." Edit</td>";
			echo "<td>".$stroka['author_name']."</td>";
			echo "<td>".$stroka['email']."</td>";
			echo "<td>".$stroka['text']."</td>";
			if ($stroka['status']!=0) {
				echo "<td>Выполнено</td>";
			}else{
				echo "<td>Не выполнено</td>";
			}
		echo "</tr>";
		}
	}

	public static function edit($id)
	{
		include 'db.php';
		$arr=[];
		$sql = mysqli_query($link, "SELECT * FROM `tasks` WHERE id = ".$id." ");
		while ($stroka = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
			$arr = array('text' => $stroka['text'], 'status'=> $stroka['status']);
		}
		return $arr;
	}

	public function action_save($id)
	{
		include 'db.php';
		$editValue=0;
		if ($_POST['checkText']!=$_POST['text']) {
			$editValue=1;
		}
		if ($_POST['change_status']==NULL) {
			$_POST['change_status']=0;
		}
		$sql = "UPDATE tasks SET status = ".$_POST['change_status'].", `text` = '".$_POST['text']."', `edit` = '".$editValue."'  WHERE tasks.id = '".$id."';";
		if (strlen($_POST['text'])<1000) {
			if (mysqli_query($link, $sql)) {
				$mess= "Успешно отредактировано";
			}else{
				echo "Что-то пошло не так:".$sql."<br>".mysqli_error($link);
			}
		}else{
			$mess= "Допустимое кол-во символов 1000.";
		}
		session_start();
		$_SESSION['mess']=$mess;
		header("Location: /admin");
	}

	public function fixtags($text)
		{
			$text = htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
			return $text;
		}

	public function action_created()
	{
		include 'db.php';
		$filterText= Controller::fixtags($_POST['text']);
		$filterName= Controller::fixtags($_POST['name']);
		$sql= "INSERT INTO `tasks` (`author_name`, `email`, `text`, `status`, `edit`) VALUES ('".$filterName."', '".$_POST['email']."', '".$filterText."', '0', '0');";
		if (strlen($_POST['name'])>255 or strlen($_POST['name'])==0) {
			$result= "Поле 'Имя' не может быть пустым или быть больше 255 символов!";
		}
		elseif ($_POST['email']>255 or !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$result = "Введенный email адрес не соответствует своему типу!";
		}
		elseif (strlen($_POST['text'])>1000 or strlen($_POST['text'])==0) {
			$result = "Поле 'Текст' не может быть пустым или быть больше 1000 символов!";
		}else{
			mysqli_query($link, $sql);
			$result = "Успешно добавлено!";
		}

		session_start();		
		$_SESSION['result']= $result;
		header("Location: /create");
	}
}

?>