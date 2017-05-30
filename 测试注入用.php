<?php
	echo "This is a test</br></br>";
	$mysql_server_name="localhost";  #数据库地址（localhost代表本地，可以使用远程的IP地址，例如192.168.1.1)
	$mysql_username="root";  #数据库账号  此处更改为你的账号
	$mysql_password="nicai";  #数据库密码  此处更改为你的密码
	$mysql_database="test";  #数据库库名  此处更改为你的数据库
	
	
	@$query1 = "select * from admin where id = ";  #数据库查询语句，数字型
	#示例url  http://localhost/你的脚本名.php?id=1
	@$query1.= stripslashes($_GET["id"]);  #接收php后面的?id=的值，并去掉\，因为数字型不需要补全单引号所以不加单引

	
	
	@$query2 = "select * from admin where name = '";  #数据库查询语句,字符型
	#示例url  http://localhost/你的脚本名.php?username=admin
	@$query2.= stripslashes($_GET["username"]);  #接收php后面的?username=的值，并去掉\
	@$query2.= "'";  #补完查询语句
	
	
	@$query3 = "select * from admin where pwd like '%";  #数据库查询语句，搜索型
	#示例url  http://localhost/你的脚本名.php?password=es
	@$query3.= stripslashes($_GET["password"]);  #接收php后面的?password=的值，并去掉\
	@$query3.= "%'";  #补完查询语句
	
	

	$link = mysql_connect($mysql_server_name,$mysql_username,$mysql_password);  #建立数据库连接
	$db_selected = mysql_select_db("$mysql_database",$link);  #选择数据库
	if (@$_GET["id"]) {
		echo "it's select id</br></br>";
		echo "chaxunyuju:     ".@$query1."</br></br>";  #输出完整的查询语句
		$res = mysql_query($query1,$link);  #执行查询ID
	} elseif (@$_GET["username"]) {
		echo "it's select username</br></br>";
		echo "chaxunyujuwei:     ".@$query2."</br></br>";  #输出完整的查询语句
		$res = mysql_query($query2,$link);  #执行查询USERNAME
	} elseif (@$_GET["password"]) {
		echo "it's select password</br></br>";
		echo "chaxunyujuwei:     ".@$query3."</br></br>";  #输出完整的查询语句
		$res = mysql_query($query3,$link);  #执行查询PASSWORD
	} else {
		echo "you have not select anything</br>";  #你没有查询任何东西
	}
	
	while(@$row = mysql_fetch_row(@$res)){  #输出查询结果
		echo "ID:".$row[0]."</br></br>";
		echo "username:".$row[1]."</br></br>";
		echo "password:".$row[2]."</br></br>";
	};
	/*表结构
	admin表
	id  name  pwd
	1   admin admin
	2   test  test 
	*/
	
?>
