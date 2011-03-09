<?

/*

Plugin Name: User Profile Check

Plugin URI: http://openattribute.com

Helps to ensure good user profile pages

Version: 0.2

Author: Pat Lockley

Author URI: http://www.pgogy.com

*/

function user_profile_check() {
	
	global $current_user;
	
	get_currentuserinfo();
	
	$user_info = get_userdata($current_user->ID);
	
	$warning_string = "";	
	
    if($user_info->user_email==""){
    
    	$warning_string .= "<p>You could benefit from setting an <b>email address</b></p>";
    
    }
    
    if($user_info->user_email==""){
    
    	$warning_string .= "<p>You could benefit from setting a <b>personal web address</b></p>";
    
    }
    
    if($user_info->display_name==""){
    
    	$warning_string .= "<p>You could benefit from setting a <b>display name</b></p>";
    
    }
    
    if($user_info->user_firstname==""){
    
    	$warning_string .= "<p>You could benefit from setting a <b>first name</b></p>";
    
    }
    
    if($user_info->user_lastname==""){
    
    	$warning_string .= "<p>You could benefit from setting a <b>last name</b></p>";
    
    }
    
    if($user_info->user_description==""){
    
    	$warning_string .= "<p>You could benefit from setting a <b>biography for yourself</b></p>";
    
    }
    
    if($warning_string!=""){
    
    	echo "<div class='updated fade'>";
    	
    	echo "<p style=\"text-decoration:underline; font-weight:bold\">User Information</p>";
    	
    	echo $warning_string;
    	
    	echo "<p>You can add this information on your <a href=\"profile.php\">user profile</a></p>";
    
    	echo "</div>";
    
    }

}

add_action('admin_notices', 'user_profile_check');

?>
