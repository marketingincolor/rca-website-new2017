<?php 
function EWD_US_Upgrade_To_Full() {
	global $ewd_us_message, $EWD_US_Full_Version;
	
	$Key = trim($_POST['Key']);
	
	if ($Key == "EWD Trial" and !get_option("EWD_US_Trial_Happening")) {
		$ewd_urp_message = array("Message_Type" => "Update", "Message" => __("Trial successfully started!", 'ultimate-slider'));

		update_option("EWD_US_Trial_Expiry_Time", time() + (7*24*60*60));
		update_option("EWD_US_Trial_Happening", "Yes");
		update_option("EWD_US_Full_Version", "Yes");
		$EWD_US_Full_Version = get_option("EWD_US_Full_Version");

		$Admin_Email = get_option('admin_email');

		$opts = array('http'=>array('method'=>"GET"));
		$context = stream_context_create($opts);
		$Response = unserialize(file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/Register_Trial.php?Plugin=US&Admin_Email=" . $Admin_Email . "&Site=" . get_bloginfo('wpurl'), false, $context));
	}
	elseif ($Key != "EWD Trial") {
		$opts = array('http'=>array('method'=>"GET"));
		$context = stream_context_create($opts);
		$Response = unserialize(file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/EWD_US_KeyCheck.php?Key=" . $Key . "&Site=" . get_bloginfo('wpurl'), false, $context));
		//echo "http://www.etoilewebdesign.com/UPCP-Key-Check/EWD_OTP_KeyCheck.php?Key=" . $Key . "&Site=" . get_bloginfo('wpurl');
		//$Response = file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/KeyCheck.php?Key=" . $Key);
		
		if ($Response['Message_Type'] == "Error") {
			  $ewd_us_message = array("Message_Type" => "Error", "Message" => $Response['Message']);
		}
		else {
				$ewd_us_message = array("Message_Type" => "Update", "Message" => $Response['Message']);
				update_option("EWD_US_Trial_Happening", "No");
				delete_option("EWD_US_Trial_Expiry_Time");
				update_option("EWD_US_Full_Version", "Yes");
				$EWD_US_Full_Version = get_option("EWD_US_Full_Version");
		}
	}
}

 ?>
