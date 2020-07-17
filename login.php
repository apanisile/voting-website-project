
<?php
if(isset($_POST['submit'])){
		// Fetching variables of the form which travels in URL
		$usrname = $_POST['usrname'];
		$psw = $_POST['password']
		if($usrname !='' && $psw !='')
		{
			//  To redirect form on a particular page
			header("vote.html");
		} else {
			?>
			<span>
			<?php echo "Please fill all fields.....!!!!!!!!!!!!";?>
		</span>
		<?php
		}
	}
?>