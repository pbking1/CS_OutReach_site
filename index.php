<!-- Include the header -->
<?php
include "header.php";
?>



    
    <!-- A jumbotron to post recent events or announcements at the top of the page.  This can include pictures -->
    
<div class="jumbotron">
    <div class="container">
        <h1>Student Outreach</h1>
        <p>The IUPUI Student Outreach program is an initiative my IUPUI to get more young students interested in computers, science, and mathematics.</p>
        <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
    </div>
</div>

<div class="row">


    <!-- <h3>Example Title</h3> -->
    
    <p>
	<?php
		if (isset($_SESSION['uid'])) {
			echo "Thank you, ".$_SESSION['uid'].", for registering!"." A confirmation has been sent to the provided email.";
		} /*else {
			echo "This is just an example of how text is formatted on the page.";
		}*/
   	?>
	<?php
		include_once('simple_html_dom.php');
		$html = file_get_html('https://news.ycombinator.com/');
		$flag = 0;
		foreach($html->find('a') as $e)
			if($flag == 1){
				$content1 = $e -> outertext;
				$content1_array = explode("\n", $content1);
				for($i = 0; $i < count($content1_array); $i++){
					if(strlen($content1_array[$i]) > 80)
						echo $content1_array[$i]."<br>";
				}
			}
			else
				$flag =1;
	?>
    </p>
    
    

</div>





<!-- Include the footer.  This includes the javascript. -->
<?php
include "footer.php";
?>
