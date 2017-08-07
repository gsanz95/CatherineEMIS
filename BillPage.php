
<!--
 * Created by PhpStorm.
 * User: stefan
 * Date: 8/2/17
 * Time: 2:31 PM
 */
-->
<!DOCTYPE html>
<?php

    #Login to SQL database
    $mysqli = mysqli_connect("localhost", "root", "slowpokesale", "mysql");
     if($mysqli->connect_error) {
         die("Connection failed: " . $mysqli->connect_error);
     }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

        .scrollit {
            overflow:scroll;
            height:300px;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #82b74b;
        }

        h1 {
            margin: 0;
            background-color: #3e4444;
            color: white;
            font-family: "Trebuchet MS";
        }

        .out {
            text-align: center;
            float: right;
            height: 38px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            position: fixed;
            background-color: #3e4444;
            border-radius: 5px;
        }

        li {
            display: inline;
            float: left;
            border-right: 2px solid #ffffff;
            border-bottom: 1px solid #ffffff;
            padding: 9px 51px;
        }

        li a {
            display: block;
            background-color: #3e4444;
            text-align: center;
            font-weight: normal;
            color: white;
            text-decoration: none;
        }

        li a:hover {
            background-color: #7e573f;
        }

        .button {
            background-color: #e20000;
            color: white;
            border: medium none;
            border-radius: 3px;
            font-size-adjust: inherit;

        }

        .div_border_bottom {
            border-bottom: solid #ffffff 1px;
        }

        .div_below_header {
            border:8px solid #ffffff;
            width:60%;
            height:100px;
            position: relative;
            top: 500px;
            font-size-adjust: inherit;
            border: medium none;
            border-radius: 3px;
            text-align: center;
        }

        tab5{ padding-right: 20em;}

          table, td{



             padding: 1px;
              border: 1px solid powderblue;
             border-collapse: collapse;
              background-color: white;
              align="center"


        }
        th {

            text-align: center;
            border: 3px solid powderblue;
            align="center"
        }
        td{

        }


    </style>
    <title>Bill Page</title>
</head>
<body>
<h1>
    This is the bill page!
</h1>
<div class="div_border_bottom"></div>

<?php

$pMessage = array();
$pDate = array();
$pAmount = array();

#Gets number of rows in Bills table
$sql="SELECT * FROM Bills ";
$result=mysqli_query($mysqli,$sql);
$rows=mysqli_num_rows($result);
$numEntry =0;

#Finds each table entry for person_id
for($y = 1; $y <= $rows; $y++) {

    $id = $mysqli->query("SELECT person_id FROM Bills WHERE id = '$y'")
        ->fetch_object()->person_id;




    if ($id == 2) {

        $numEntry++;


        $pMessage[] = $mysqli->query("SELECT DISTINCT message FROM Bills WHERE person_id = '2' AND id = $y ")
            ->fetch_object()->message;

        $pAmount[] = $mysqli->query("SELECT amount FROM Bills WHERE person_id = '2' AND id = $y ")
            ->fetch_object()->amount;

        $pDate[] = $mysqli->query("SELECT date FROM Bills WHERE person_id = '2' AND id = $y")
            ->fetch_object()->date;
    }

}

?>



<ul>
    <li><a href="/CatherineEMIS/homepage.html">Home</a></li>
    <li><a href="/CatherineEMIS/BillPage.html">Bill</a></li>
    <li><a href="/CatherineEMIS/PersonalInfo.html">Personal Information</a></li>
    <li><a href="/MedicalInfo.html">Medical Information</a></li>
    <button type="submit" class="button out" value="Logout">Logout</button>
</ul>


<div class="div_below_header"></div>


<tr>
    <td colspan = "10">
        <div class="scrollit", style="width: 80%">
            <table style="width: 80%">


                <tr>
                    <?php echo "<th><tab5>Message: </tab5></th>" ?>
                    <?php echo "<th><tab5>Amount</tab5></th>" ?>
                    <?php echo "<th><tab5>Date:</tab5></th>" ?>
                </tr>

                <?php
                for ($x = 0; $x < $numEntry; $x++){

                        echo "<tr><td> $pMessage[$x] </td><td>$pAmount[$x]</td><td>$pDate[$x] </td></tr>";
                };
                ?>

            </table>
        </div>
    </td>
</tr>




</body>

</html>
