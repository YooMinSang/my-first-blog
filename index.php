<!#DataBase 로그인, Table 세팅>
<?php
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_password = 'apmsetup';
  $mysql_db = 'yd_travel';
  $conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
  $dbcon = mysql_select_db($mysql_db, $conn);

  // @웹의 내용에 관한 정보를 저장한 테이블입니다.
  $result_l = mysql_query("SELECT * FROM list_table");
 ?>

<!DOCTYPE html>

<html>

<!#head시작>
<head>
  <meta charset="utf-8">
  <title>YDtravel</title>

  <!@style.css불러오기>
  <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8080/ydtravel/style.css">
</head>

<!#body 시작>
<body>

   <!@로그인 기능>
   <div id="login">
     ID : <input type="text" />
     PASSWORD : <input type="text" />
     <input type="button" value="확인" onclick="document.getElementById('target').className='white'"/>
   </div>

   <!@대제목>
   <header id="headstyle">
     <h1><a href="http://127.0.0.1:8080/ydtravel/index.php">YD TRAVEL WEB</a></h1>
   </header>

   <!@리스트>
   <nav>
 		<ul>
       <?php
         while ($row = mysql_fetch_assoc($result_l)) {
         echo '<li id = "liststyle"><a href="http://127.0.0.1:8080/ydtravel/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
         }
        ?>
 		</ul>
 	</nav>

  <!@본문내용>
  <article>
    <?php
      if(empty($_GET['id'])===true){

      }
      else {
        $sql = 'SELECT * FROM list_table WHERE id='.$_GET['id'];
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
        echo '<h2 id = "timestyle">'.$row['created'].'</h2>';
      }
     ?>
  </article>
</body>

</html>
