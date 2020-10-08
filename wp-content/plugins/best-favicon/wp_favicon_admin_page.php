<h2>Simple Favicon</h2>
<?php
require( plugin_dir_path(__FILE__) . 'class-php-ico.php' );
$upload_dir = wp_upload_dir();
if($_POST['submit_form'] == 'Update') {
	$favicon_updated = false;

	//if($_POST['default_favicon'] != '') {
	if($_FILES["default_favicon"]["error"] <= 0) {
		//$source = $_POST['default_favicon'];
		$source = $_FILES["default_favicon"]["tmp_name"];
		$file_name = 'your-favicon' . generateRandomString() . '.ico';
		$destination = $upload_dir['path'] . '/' . $file_name;

		$ico_lib = new PHP_ICO( $source, array( array( 32, 32 ), array( 64, 64 ) ) );
		$ico_lib->save_ico( $destination );	
		update_option( 'wp_favicon_current', $upload_dir['url'] . '/' . $file_name );
		$favicon_updated = true;
	}
	
	//if($_POST['mobile_favicon'] != '') {
	if($_FILES["mobile_favicon"]["error"] <= 0) {
		//$source = $_POST['mobile_favicon'];
		$source = $_FILES["mobile_favicon"]["tmp_name"];
		$file_name = 'your-favicon-mobile' . generateRandomString() . '.ico';
		$destination = $upload_dir['path'] . '/' . $file_name;

		$ico_lib = new PHP_ICO( $source, array( array( 32, 32 ), array( 64, 64 ) ) );
		$ico_lib->save_ico( $destination );	
		update_option( 'wp_favicon_current_mobile', $upload_dir['url'] . '/' . $file_name );
		$favicon_updated = true;
		//echo '<p>' . $_FILES["mobile_favicon"]["tmp_name"] . '**</p>';
	}	
	
	if($favicon_updated)
		echo '<div id="message" class="updated"><p><strong>Favicon updated.</strong></p></div>';

}
//echo '<p>' . $upload_dir['path'] . '</p>';
?>

<style type="text/css">
.wp_favicon_tbl td { padding: 8px 5px; font-family: tahoma, arial, verdana; font-size: 13px; }
.wp_favicon_tbl td input[type=text] { width: 250px; }
</style>

<script>
jQuery(document).ready(function() {
 
    var formfield;
 
    /* user clicks button on custom field, runs below code that opens new window */
    jQuery('.onetarek-upload-button').click(function() {
        //formfield = jQuery(this).prev('input'); //The input field that will hold the uploaded file url
	formfield = jQuery('#default_favicon_holder'); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
 
        return false;
    });
    

    jQuery('.onetarek-upload-button2').click(function() {
        formfield = jQuery('#mobile_favicon_holder'); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
 
        return false;
    });

    //adding my custom function with Thick box close function tb_close() .
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };
 
});
</script>

<form method="post" enctype="multipart/form-data">
<table border="0" class="wp_favicon_tbl">
<tr>
	<td>Default Favicon URL</td>
	<td><!--<input type="text" name="default_favicon" id="default_favicon_holder" />--><input type="file" name="default_favicon" id="default_favicon"></td>
	<td><img src="<?php echo get_option( 'wp_favicon_current', '' ); ?>" alt=" " /></td>
	<td><!--<small><a href="<?php bloginfo('url'); ?>/wp-admin/media-new.php">click here to upload image</a></small>--><!--<input  class="onetarek-upload-button button" type="button" value="Upload Image" />--></td>
</tr>
<tr>
	<td>iPad, iPhone, or iPod Touch Icon Favicon URL</td>
	<td><!--<input type="text" name="mobile_favicon" id="mobile_favicon_holder" />--><input type="file" name="mobile_favicon" id="mobile_favicon"></td>
	<td><img src="<?php echo get_option( 'wp_favicon_current_mobile', '' ); ?>" alt=" " /></td>
	<td><!--<small><a href="<?php bloginfo('url'); ?>/wp-admin/media-new.php">click here to upload image</a></small>--><!--<input  class="onetarek-upload-button2 button" type="button" value="Upload Image" />--></td>
</tr>
</table>
<p><input type="submit" name="submit_form" class="button-primary" value="Update" /></p>
</form>