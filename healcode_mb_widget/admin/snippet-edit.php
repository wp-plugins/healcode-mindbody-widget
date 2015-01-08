<?php 

global $wpdb;
global $current_user;
get_currentuserinfo();

$hc_hmw_snippetId = $_GET['snippetId'];

if(isset($_POST) && isset($_POST['updateSubmit'])){

// 		echo '<pre>';
// 		print_r($_POST);
// 		die("JJJ");
	$_POST = stripslashes_deep($_POST);
	$_POST = hc_trim_deep($_POST);
	
	$hc_hmw_snippetId = $_GET['snippetId'];
	
	$temp_hc_hmw_title = str_replace(' ', '', $_POST['snippetTitle']);
	$temp_hc_hmw_title = str_replace('-', '', $temp_hc_hmw_title);
	
	$hc_hmw_title = str_replace(' ', '-', $_POST['snippetTitle']);
	$hc_hmw_content = $_POST['snippetContent'];

	if($hc_hmw_title != "" && $hc_hmw_content != ""){
		
		if(ctype_alnum($temp_hc_hmw_title))
		{
		$snippet_count = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'hc_hmw_short_code WHERE id!=%d AND title=%s LIMIT 0,1',$hc_hmw_snippetId,$hc_hmw_title)) ;
		
		if($snippet_count == 0){
			$hc_shortCode = '[hc-hmw snippet="'.$hc_hmw_title.'"]';
			
			$wpdb->update($wpdb->prefix.'hc_hmw_short_code', array('title'=>$hc_hmw_title,'content'=>$hc_hmw_content,'short_code'=>$hc_shortCode,), array('id'=>$hc_hmw_snippetId));
			
			header("Location:".admin_url('admin.php?page=insert-html-short-manage&msg=5'));
	
		}else{
			?>
			<div class="system_notice_area_style0" id="system_notice_area">
			Widget shortcode already exists. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
			</div>
			<?php	
	
		}
		}
		else
		{
			?>
		<div class="system_notice_area_style0" id="system_notice_area">
		Widget title can have only alphabets,numbers or hyphen. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
		<?php
		
		}
		
	
	}else{
?>		
		<div class="system_notice_area_style0" id="system_notice_area">
			Fill all mandatory fields. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
		</div>
<?php 
	}

}


global $wpdb;


$snippetDetails = $wpdb->get_results($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'hc_hmw_short_code WHERE id=%d LIMIT 0,1',$hc_hmw_snippetId )) ;
$snippetDetails = $snippetDetails[0];

?>

<div >
	<fieldset
		style="width: 99%; border: 0px solid #F7F7F7; padding: 10px 0px;">
		<legend>
			<b>Edit Widget</b>
		</legend>
		<form name="frmmainForm" id="frmmainForm" method="post">
			<input type="hidden" id="snippetId" name="snippetId"
				value="<?php if(isset($_POST['snippetId'])){ echo esc_attr($_POST['snippetId']);}else{ echo esc_attr($snippetDetails->id); }?>">
			<div>
				<table
					style="width: 99%; background-color: #F9F9F9; border: 1px solid #E4E4E4; border-width: 1px;margin: 0 auto">
					<tr><td><br/>
					<div id="shortCode"></div>
					<br/></td></tr>
					<tr valign="top">
						<td style="border-bottom: none;width:20%;">&nbsp;&nbsp;&nbsp;Widget Title&nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td><input style="width:80%;"
							type="text" name="snippetTitle" id="snippetTitle"
							value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']);}else{ echo esc_attr($snippetDetails->title); }?>"></td>
					</tr>
					<tr>
						<td style="border-bottom: none;width:20%; ">&nbsp;&nbsp;&nbsp;Widget Code&nbsp;<font color="red">*</font></td>
						<td style="border-bottom: none;width:1px;">&nbsp;:&nbsp;</td>
						<td >
							<textarea name="snippetContent" style="width:80%;height:150px;"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']);}else{ echo esc_textarea($snippetDetails->content); }?></textarea>
						</td>
					</tr>				

				<tr>
				<td></td><td></td>
					<td><input class="button-primary" style="cursor: pointer;"
							type="submit" name="updateSubmit" value="Update"></td>
				</tr>
				<tr><td><br/></td></tr>
				</table>
			</div>

		</form>
	</fieldset>

</div>
