<?php
  $user = 'root';
  $password = 'root';
  $dbName = 'chapter6_db';
  $host = 'localhost:8889';
  $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>レコード一覧</title>
</head>
<body>
  <center>
    <div>
      <?php
      try{
        $pdo = new PDO( $dsn , $user , $password );
        $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES , false );
        $pdo->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
        $sql = "SELECT * FROM table1";
        $stm = $pdo->prepare( $sql );
        $stm->execute();
        $result = $stm->fetchAll( PDO::FETCH_ASSOC );
        echo "<table>";
        echo "<thead><tr>";
        echo "<th>" , "ID" , "</th>";
        echo "<th>" , "名前" , "</th>";
        echo "<th>" , "部署" , "</th>";
        echo "<th>" , "役職" , "</th>";
        echo "</tr></thead>";
        echo "<tbody>";
        foreach( $result as $row ){
          echo "<tr>";
          echo "<td>" , $row['id'] , "</td>";
          echo "<td>" , $row['name'] , "</td>";
          echo "<td>" , $row['dep'] , "</td>";
          echo "<td>" , $row['role'] , "</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
      } catch( Exception $e ) {
        echo $e->getMessage();
        echo "<font size=5>" , "レコード一覧の取得に失敗しました" , "</font>";
        echo '<p><a href="../index.html">戻る</a></p>';
        exit();
      }
    ?>
    <hr>
    <p><a href="../index.html">戻る</a></p>
  </div>
  </center>
</body>
</html>
