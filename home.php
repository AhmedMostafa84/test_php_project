<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpproject</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cabin&family=Cairo:wght@300&family=Inter:wght@400;600&family=Lato:ital,wght@0,300;0,400;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

    <link href="css/style.css" rel="stylesheet">

    <style>
        body {

            background-color: whitesmoke;
            font-family: 'Amiri', serif;

        }

        #mother{

            width: 100%;
            font-size: 20px;
        }

        main{

            float: left;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 10px;
            font-family: 'Amiri', serif;

        }

        aside{
            text-align: center;
            width: 300px;
            float: right;
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;
        }
        #tbl{
            width: 890px;
            font-size: 20px;
             text-align: center;
        }
         
        #tbl:hover{

            background-color: white;
        }

        #tbl th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 10px;
            text-align: center;
        }

        aside button{
            width: 190px;
            padding: 8px;
            margin-top: 7px;
            font-size: 17px;
            font-family: 'Amiri', serif;
            font-weight: bold;

        }
    </style>
</head>

<body dir="rtl">
    <?php
      # الاتصال بقاعدة البيانات

      $host='localhost';
      $user='root';
      $pass='';
      $db='student';
      $con=mysqli_connect($host,$user,$pass,$db);
      $res=mysqli_query($con, "select * from student");

      # button variable

      $id='';
      $name='';
      $address='';

      if(isset($_POST['id'])) {
        
        $id=$_POST['id'];
      }

      if(isset($_POST['name'])) {
        
        $name=$_POST['name'];
      }

      if(isset($_POST['address'])) {
        
        $address=$_POST['address'];
      }

      $sqls='';

      if(isset($_POST['add'])) {
        
       $sqls="insert into student value($id,'$name','$address')";

       mysqli_query($con,$sqls);

       header('location:home.php');

      }

      if(isset($_POST['del'])) {
        
       $sqls="delete from student where name='$name'";

       mysqli_query($con,$sqls);

       header("location:home.php");

      }




    ?>
    <div id="mother">
        <form method="POST">
            <aside>
                <!-- لوحة التحكم-->
                <div id="div">
                    <img src="https://pacapply.com/wp-content/uploads/2020/01/pac-who-we-are-home.png" alt="لوجو الموقغ" width="100px">
                    <h3>لوحة المدير</h3>
                    <label>رقم الطالب:</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label>اسم الطالب:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label>عنوان الطالب:</label><br>
                    <input type="text" name="address" id="address"><br><br>
                    <button name="add">اضافة طالب</button>
                    <button name="del">حذف الطالب</button>
                </div>
            </aside>
            <!-- عرض بيانات الطلاب-->
            <main>
                <table id="tbl">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php
                     
                     while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>" .$row['id']."</td>";
                        echo "<td>" .$row['name']."</td>";
                        echo "<td>" .$row['address']."</td>";
                        echo "</tr>";
                     }
                    
                    ?>

                </table>
            </main>

        </form>
    </div>
</body>

</html>