<?php
	echo "This is a test</br></br>";
	$mysql_server_name="localhost";  #���ݿ��ַ��localhost�����أ�����ʹ��Զ�̵�IP��ַ������192.168.1.1)
	$mysql_username="root";  #���ݿ��˺�  �˴�����Ϊ����˺�
	$mysql_password="nicai";  #���ݿ�����  �˴�����Ϊ�������
	$mysql_database="test";  #���ݿ����  �˴�����Ϊ������ݿ�
	
	
	@$query1 = "select * from admin where id = ";  #���ݿ��ѯ��䣬������
	#ʾ��url  http://localhost/��Ľű���.php?id=1
	@$query1.= stripslashes($_GET["id"]);  #����php�����?id=��ֵ����ȥ��\����Ϊ�����Ͳ���Ҫ��ȫ���������Բ��ӵ���

	
	
	@$query2 = "select * from admin where name = '";  #���ݿ��ѯ���,�ַ���
	#ʾ��url  http://localhost/��Ľű���.php?username=admin
	@$query2.= stripslashes($_GET["username"]);  #����php�����?username=��ֵ����ȥ��\
	@$query2.= "'";  #�����ѯ���
	
	
	@$query3 = "select * from admin where pwd like '%";  #���ݿ��ѯ��䣬������
	#ʾ��url  http://localhost/��Ľű���.php?password=es
	@$query3.= stripslashes($_GET["password"]);  #����php�����?password=��ֵ����ȥ��\
	@$query3.= "%'";  #�����ѯ���
	
	

	$link = mysql_connect($mysql_server_name,$mysql_username,$mysql_password);  #�������ݿ�����
	$db_selected = mysql_select_db("$mysql_database",$link);  #ѡ�����ݿ�
	if (@$_GET["id"]) {
		echo "it's select id</br></br>";
		echo "chaxunyuju:     ".@$query1."</br></br>";  #��������Ĳ�ѯ���
		$res = mysql_query($query1,$link);  #ִ�в�ѯID
	} elseif (@$_GET["username"]) {
		echo "it's select username</br></br>";
		echo "chaxunyujuwei:     ".@$query2."</br></br>";  #��������Ĳ�ѯ���
		$res = mysql_query($query2,$link);  #ִ�в�ѯUSERNAME
	} elseif (@$_GET["password"]) {
		echo "it's select password</br></br>";
		echo "chaxunyujuwei:     ".@$query3."</br></br>";  #��������Ĳ�ѯ���
		$res = mysql_query($query3,$link);  #ִ�в�ѯPASSWORD
	} else {
		echo "you have not select anything</br>";  #��û�в�ѯ�κζ���
	}
	
	while(@$row = mysql_fetch_row(@$res)){  #�����ѯ���
		echo "ID:".$row[0]."</br></br>";
		echo "username:".$row[1]."</br></br>";
		echo "password:".$row[2]."</br></br>";
	};
	/*��ṹ
	admin��
	id  name  pwd
	1   admin admin
	2   test  test 
	*/
	
?>
