<?

/*

Plugin Name: M2R1D2

Plugin URI: http://openattribute.com

Add Microdata, Microformat and RDFa into each post

Version: 0.2

Author: Pat Lockley

Author URI: http://www.pgogy.com

*/

function micro_options_page() {
  ?>
  	<div class="wrap">
	<h2>Keyword swap</h2>
	<p>Please enter the licenses you wish to use below</p>
	<form method="post" action="options.php">
    <?php settings_fields( 'microf_microd_rdfa' ); ?>
    <textarea rows="20" cols="100" name="micro_template" ><?php 
    
    														$string = get_option('micro_template');
    														
    														if($string==""){
    														
    															
    														
    														}else{
    														
    															echo $string;
    														
    														}
    														 
    														
    												?></textarea>    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
	</form>
</div>
  
  <?php
}

	function register_microf() {
		//register our settings
		register_setting( 'microf_microd_rdfa', 'micro_template' );
	}


	function add_micro_rdfa($output){
	
		$template = get_option('micro_template');
				
		$template = str_replace("~AUTHOR~",get_the_author(),$template);
		
		if(strlen(get_the_author_link())==0){
		
			$template = str_replace("~AUTHORURL~",get_the_author_link(),$template);
			
			echo get_the_author_link();
			
		}else{
		
			$template = str_replace("~AUTHORURL~",get_bloginfo('siteurl') . "?author=" . get_the_author_meta('ID'),$template);
		
		}
		$template = str_replace("~BLOGTITLE~",the_title("","",0),$template);
		
		$categories = "";
		
		foreach((get_the_category()) as $category) { 
		
			$categories .= " " . $category->cat_name;
		
		}
		
		if(strlen($categories)!=0){
		
			$template = str_replace("~BLOGCATEGORIES~",$categories,$template);	
		
		}else{
		
			$template = str_replace("~BLOGCATEGORIES~","None found",$template);	
		
		}	
			
		return $output . $template;
	
	}

function micro_menu_option() {
  add_options_page('M2R1D2 Options', 'M2R1D2 Options', 'manage_options', 'microf_microd_rdfa', 'micro_options_page');
}


add_action('admin_init', 'register_microf' );
add_action('admin_menu', 'micro_menu_option');
add_filter( "the_content", "add_micro_rdfa" )
?>
