<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  

<?php

$name = $text  = "";
$check = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = valida_head($_POST["name"]);
  if($check == 0){
    $text = valida_text($_POST["text"]);
  }

}

function valida_head($data){
    if(preg_match('/[!@#$%^&*()_+\-\[\]{},.?<>]/',$data)){ 
      $mess = "อย่าใช้ special char";
      $GLOBALS['check'] = 1;
      return $mess;
    }
    else if(preg_match('/^.{4,140}$/', $data)) {
      $GLOBALS['check'] = 0;
      $data = htmlspecialchars($data);
      return $data;
    } else {
      echo " ชื่อกระทู้ 6-140 <br>";
    }
}

function valida_text($data){
  
  if(preg_match('/^.{6,20000}$/', $data)){
    return $data;
  } else {
    echo "เนื้อหาของกระทู้ 6 - 20,000 ";
  }

}

?>

<h2>PHP กระทู้ !!!</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ตั้งกระทู้ใหม่่: <input type="text" name="name">
  <br><br>

  เนื้อหากระทู้ <br>
  <textarea name = "text" rows="20" cols="40"></textarea>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>ตั้งกระทู้มาใหม่่ รายวัน:</h2>";
echo "ชื่อ: " . $name;
echo "<br>เนื้อหา:" . $text;
echo "<br>" ;


?>

</body>
</html>