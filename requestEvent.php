<!-- Include the header -->
<?php
include "header.php";
require_once "inc/dbconnect.php";
require_once "inc/util.php";
if (!isset($_SESSION['email'])) {
    header ('Location: login.php');
}
else {
   //$sql = "select Authenticated From K12_TEACHER WHERE Email = '" .$_SESSION['email']."'";
    $sql = "call K12_TEACHER_AUTHENTICATED('" .$_SESSION['email']."')"; 
    $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //send the query to the database or quit if cannot connect
    $activated = mysqli_fetch_array($result);
    
    //Prepare the db for the next query.
    $result->close();
    $con->next_result();
    
    if ($activated[0] == 'no')
    Header ("Location:activation.php") ;
}
?>

<script src="js/fillDays.js"></script>

<?php

//initialize all the variables

$msg = "";
$reqn = "";
$reqc = "";
$et="";
$m="";
$d="";
$y="";
$date="";
$sh="";
$eh="";
$sm="";
$em="";
$endDate="";
$sampm="";
$eampm="";
$st="";
$et="";
$note="";

//runs if the enter button is pressed
if (isset($_POST['requestEvent']))
{	            
                
    //checking to make sure a value is input for each field before trying to set the variable to equal that value.
    if (isset($_POST['requestor_name']))
        $reqn = trim($_POST['requestor_name']);
    
	if (isset($_POST['requestor_contact']))
        $reqc = trim($_POST['requestor_contact']);
    
	if (isset($_POST['event_title']))
        $et = trim($_POST['event_title']);
    
    if (isset($_POST['month']))
        $m = trim($_POST['month']);
				
    if (isset($_POST['day']))
        $d = trim($_POST['day']);
    
    if (isset($_POST['year']))
        $y = trim($_POST['year']);
    
    if (isset($_POST['startHour']))
        $sh = trim($_POST['startHour']);
    
    if (isset($_POST['endHour']))
        $eh = trim($_POST['endHour']);
    
    if (isset($_POST['startMin']))
        $sm = trim($_POST['startMin']);
    
    if (isset($_POST['endMin']))
        $em = trim($_POST['endMin']);
    
    if (isset($_POST['startAMPM']))
        $sampm = trim($_POST['startAMPM']);
    
    if (isset($_POST['endAMPM']))
        $eampm = trim($_POST['endAMPM']);
    
    if (isset($_POST['note']))
        $note = trim($_POST['note']);
    
    $sql = "call K12_REQUESTOR_INSERT_EVENT('".$reqn."', '".$reqc."', '".$et."', '".$m."', '".$d."', '".$y."', '".$sh."', '".$sm."', '".$sampm."', '".$eh."', '".$em."', '".$eampm."', '".$note."')";   // may want to use an autoincrement value for the eventID rather than randomly generated code  
	$result= mysqli_query($con, $sql) or die(mysqli_error($con)); //a non-select statement query will return a result indicating if the 
    if ($result) $msg = "<b>Your request has been sent.You will be hearing from us shortly</b>";
    
}
				
?>


<style>
    input[type="text"] {
        
        display:inline;
        
    }
</style>



    
<div class="row">
    
    <?php
    echo $msg;
    ?>


    <h3>Request to attend event</h3>
    
    <form action="requestEvent.php" method="post">
    <div class="form-group">
		Requestor:<input type="text" maxlength="50" name="requestor_name"><br/>
		Requestor contact:<input type="text" maxlength="50" name="requestor_contact"><br/>
        Event Title:
		<select name="event_title" id="event_title">
			<?php
				$sql = "select Title From K12_EVENTS;";
				$result= mysqli_query($con, $sql) or die(mysqli_error($con));
				while($event_t = mysqli_fetch_array($result)){
					echo "<option value=\"". $event_t["Title"]."\" \>".$event_t["Title"]."</option>";
				}
			?>
		</select>

        Date:
        <select  name = "month" id="formMonths">
                <option value = "01" selected>January</option>
                <option value = "02">February</option>
                <option value = "03">March</option>
                <option value = "04">April</option>
                <option value = "05">May</option>
                <option value = "06">June</option>
                <option value = "07">July</option>
                <option value = "08">August</option>
                <option value = "09">September</option>
                <option value = "10">October</option>
  				<option value = "11">November</option>
  				<option value = "12">December</option>
        </select> 
        <select  name = "day" id="formDays">
        </select> ,
        <select  name = "year" id="formYears">
  				<option value = "2015" selected>2015</option>
  				<option value = "2016">2016</option>
                <option value = "2017">2017</option>
                <option value = "2018">2018</option>
                <option value = "2019">2019</option>
                <option value = "2020">2020</option>
        </select> 
        <br/>
        Start Time:
        <select  name = "startHour" class="formTime">:
  				<option value = "01" selected>1</option>
  				<option value = "02">2</option>
                <option value = "03">3</option>
  				<option value = "04">4</option>
                <option value = "05">5</option>
  				<option value = "06">6</option>
                <option value = "07">7</option>
  				<option value = "08">8</option>
                <option value = "09">9</option>
  				<option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
        </select> : 
        <select  name = "startMin" class="formTime">
  				<option value = "00" selected>00</option>
  				<option value = "15">15</option>
                <option value = "30">30</option>
  				<option value = "45">45</option>
        </select>
        <select  name = "startAMPM" class="formTime">
  				<option value = "AM" selected>A.M.</option>
  				<option value = "PM">P.M.</option>
        </select> 
        <br/>
        End Time:
        <select  name = "endHour" class="formTime">
  				<option value = "01" selected>1</option>
  				<option value = "02">2</option>
                <option value = "03">3</option>
  				<option value = "04">4</option>
                <option value = "05">5</option>
  				<option value = "06">6</option>
                <option value = "07">7</option>
  				<option value = "08">8</option>
                <option value = "09">9</option>
  				<option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
        </select> : 
        <select  name = "endMin" class="formTime">
  				<option value = "00" selected>00</option>
  				<option value = "15">15</option>
                <option value = "30">30</option>
  				<option value = "45">45</option>
        </select> 
        <select  name = "endAMPM" class="formTime">
  				<option value = "AM" selected>A.M.</option>
  				<option value = "PM">P.M.</option>
        </select> 
        <br/>
        Note:

        <textarea rows="4" cols="50" name="note">
        </textarea>
        
        
        <br/><button name="requestEvent">Request Event</button>
    
    
    
    </div>
    </form>
    

</div>
    





<!-- Include the footer.  This includes the javascript. -->
<?php
include "footer.php";
?>
