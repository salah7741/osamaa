<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // الحصول على القيمة المرسلة عبر POST
  if (isset($_POST['clickuser'])) {
    $use = $_POST['clickuser'];

  }}
include_once('index.php');

$clic = isset($_POST['clickk']) ? $_POST['clickk'] : '';


$click_num = mysqli_query($conn, "SELECT id, user_frind, nameee , s1, s2 FROM frinds where user_frind =  '$use' ;");
 
   
while ($row = mysqli_fetch_array($click_num)) {

?>

<!DOCTYPE html>
<html>
<head></head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            background-color: #2b393e;
        }
        .btn {
            border: none;
            padding: 150px 150px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 90px;
            cursor: pointer;
            margin: 5px;
            border: gray 10px solid;
            border-radius: 150px;
        }
        .btnn {
            color: rgb(25, 0, 255);
            border: none;
            padding: 25px 100px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 30px;
            cursor: pointer;
            margin: 5px;
            border: rgb(93, 51, 51) 10px solid;
            border-radius: 50px;
            background-color: rgb(107, 140, 170);
        }
        .image-button {
            background-image: url('ICON.jpg'); /* مسار الصورة */
            background-size: cover;
            background-position: center;
            width: 100px;
            height: 100px;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            padding: 150px 150px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
            border: gray 10px solid;
            border-radius: 150px;
        }
    </style>
  


<body>
    <center>
       
        <label id="counter" name="" class="btnn" ><?php echo $row['id'] ;echo "  .... " ; echo $row['user_frind'];echo "  .... " ; echo $row['nameee'];echo "  .... " ;echo $row['s1'];echo "  .... " ; echo $row['s2'];echo "  .... " ;?></label>
      
    </center>

    <script>
        function increment() {
            var counter = document.getElementById("counter");
            counter.textContent = parseInt(counter.textContent);
        }
    </script>
</body>
</html>

 <?php   
}

// إغلاق الاتصال
$conn->close();

 
header("location:mainf.html");
?>