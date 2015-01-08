<?php

global $wpdb;
// Load the options


if($_POST){
	
$_POST=hc_trim_deep($_POST);
$_POST = stripslashes_deep($_POST);

			
			
			$hc_hmw_limit = abs(intval($_POST['hc_hmw_limit']));
			if($hc_hmw_limit==0)$hc_hmw_limit=20;
			
			$hc_hmw_credit = $_POST['hc_hmw_credit'];
			
			
			update_option('hc_hmw_limit',$hc_hmw_limit);
			update_option('hc_credit_link',$hc_hmw_credit);

?>


<div class="system_notice_area_style1" id="system_notice_area">
	Settings updated successfully. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
</div>


<?php
}


?>

<div>
<form method="post">
<div style="float: left;width: 98%">
	<fieldset style=" width:100%; border:0px solid #F7F7F7; padding:10px 0px 15px 10px;">
	<legend ><h3>Settings</h3></legend>
	<table class="widefat hc-short"  style="width:99%;">
				<!--		<tr valign="top">
				<td scope="row" ><label for="hc_ihs_credit">Credit link to author</label>
				</td>
				<td><select name="hc_ihs_credit" id="hc_ihs_credit">
						<option value="ihs"
						<?php /* if(isset($_POST['hc_ihs_credit']) && $_POST['hc_ihs_credit']=='ihs') { echo 'selected';}elseif(get_option('hc_credit_link')=="ihs"){echo 'selected';}  ?>>Enable</option>
						<option value="0"
						<?php  if(isset($_POST['hc_ihs_credit']) && $_POST['hc_ihs_credit']!='ihs') { echo 'selected';}elseif(get_option('hc_credit_link')!="ihs"){echo 'selected';} */ ?>>Disable</option>

				</select>
				</td>
			</tr> -->
			
			<tr valign="top">
				<td scope="row" class=" settingInput" id=""><label for="hc_hmw_limit">Pagination Limit</label></td>
				<td id=""><input  name="hc_hmw_limit" type="text"
					id="hc_hmw_limit" value="<?php if(isset($_POST['hc_hmw_limit']) ){echo abs(intval($_POST['hc_hmw_limit']));}else{print(get_option('hc_hmw_limit'));} ?>" />
				</td>
			</tr>
			
			<tr valign="top">
				<td scope="row" class=" settingInput" id="bottomBorderNone">
				</td>
				<td id="bottomBorderNone"><input style="margin:10px 0 20px 0;" id="submit" class="button-primary bottonWidth" type="submit" value=" Update Settings " />
				</td>
			</tr>
			
	</table>
	</fieldset>
	
</div>
</form>
</div>