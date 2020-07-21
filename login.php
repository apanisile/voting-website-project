<?php
        include 'connect.php';
        echo "Connected Successfully";
?>

<?php
if(isset($_POST['submit'])){
		// Fetching variables of the form which travels in URL
		$username = $_POST['username'];
		$psw = $_POST['password'];
		if($username !='' && $psw !='')
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