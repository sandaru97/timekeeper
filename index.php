<!DOCTYPE html>
<html>
<script>
  function deleteByID() {
    <?php
    $servername = "localhost";
    $username = "Public";
    $password = "";
    $mysqli = new mysqli("localhost", "Public", "", "timesheet");
    $conn = mysqli_connect($servername, $username, $password) or die("unable to connect to host");
    $sql = mysqli_select_db($mysqli, 'timesheet') or die("unable to connect to database");
    var_dump($_GET['ID']);
    var_dump($mysqli->query("DELETE  FROM timesheet WHERE id=".$_GET['ID']));
    $mysqli->close();
    ?>
  }
  deleteByID();
</script>

<body style="background-color:#D6EADF ;">
  <center>
    <h1 style="margin-right:20%;margin-left:20%;border-bottom:1px solid green;">TimeKeeper (alpha)</h1>
    Date : <form method="GET" action="#"><input value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : ''; ?>" name="date" id="date" type="date" /><input type="submit" value="Go">
      <table style=" width:100%;">
        <thead>
          <tr style="color: rgb(255, 255, 255);  border:1px solid black;width:100%;background-color: #000000;">
            <th style="width:5%;">Date</th>
            <th style="width:10%;">Start</th>
            <th style="width:10%;">Finish</th>
            <th style="width:10%;">Hours</th>
            <th style="width:25%;">Hour Code</th>
            <th style="width:30%;">Comments</th>
            <th style="width:5%;">Actions</th>
          </tr>
        </thead>
        <tr style="background-color: #5bd38d;">
          <th>
            <input value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : ''; ?>" id="date0" name="date0" type="date" disabled="true">
          </th>
          <th>
            <input name="start" type="time">
          </th>
          <th>
            <input name="finish" type="time">
          </th>
          <th>
            XX : XX
          </th>
          <th>
            <select style="width:100%;" name="code" id="code">
              <option value="NA">--- Please Select ---</option>
              <option value="CONF/TR">Conference/Training</option>
              <option value="FOD">Flex Off Day</option>
              <option value="LSL">Long Service Leave</option>
              <option value="LNB">Lunch Break</option>
              <option value="NMLF">Normal Time</option>
              <option value="OTIL">OT to be taken as time in lieu</option>
              <option value="ONC">On Call - chargeback to other areas</option>
              <option value="OCE">On Call - extended hours for ITSD</option>
              <option value="OCO">On Call - overtime call in</option>
              <option value="OTHER">Other Leave Types</option>
              <option value="OLTP">Other Leave Types - part day</option>
              <option value="OT">Overtime</option>
              <option value="OTMB">Overtime Meal Break</option>
              <option value="RECP">Rec Leave Part Day</option>
              <option value="REC">Recreational Leave</option>
              <option value="SLV">Sick Leave Day</option>
              <option value="SLVF">Sick Leave Family Day</option>
              <option value="SLVFP">Sick Leave Family Part Day</option>
              <option value="SLVP">Sick Leave Part Day</option>
              <option value="STND721">Standard Day 7:21</option>
              <option value="STUDY">Study Leave</option>
              <option value="LIEU">Time off in lieu of OT</option>
              <option value="TPD">Training Part Day</option>
            </select>
          </th>
          <th>
            <input name="comments" style="width: 100%;" type="text">
          </th>
          <th>
            <input style="font-weight: bold;color: green;" type="submit" value="+" name="" id="">
          </th>
        </tr>
    </form>

    <?php
    $mysqli = new mysqli("localhost", "Public", "", "timesheet");
    if ($_GET['code'] != "NA") {
      $stringqueryadd = "INSERT INTO timesheet (Date,Hours) VALUES ('" . $_GET['date'] . "',99)";
      var_dump($mysqli->query($stringqueryadd));
    }
    $readdata = $mysqli->query("SELECT  * FROM timesheet WHERE Date='" . $_GET['date'] . "'");
    while ($row = $readdata->fetch_assoc()) {
      //var_dump($row);
      echo (" <tr style='background-color: #cfcfcf;'>
        <td>
          1)
        </td>
        <td>
          XX:XX
        </td>
        <td>
          XX:XX </td>
        <td>
          " . $row['Hours'] . "
        </td>
        <td>
          Type
        </td>
        <td>
          Lorem upsum </td>
        <td><form action='#' method='GET'>
        <input type='hidden' name='code' value='NA'>
        <input  type='hidden' value='" . $row['ID'] . "' name='ID'>
        <input  type='hidden' value='" . $_GET['date'] . "' name='date'>
          <input  style='color: red;font-weight: bold;' type='submit' value='X'>
        </form>
          </td>

      </tr>");
    }
    $mysqli->close();
    ?>
    </table>
    <h3><b>TOTAL TIME : XX</b></h3>

</body>

</html>