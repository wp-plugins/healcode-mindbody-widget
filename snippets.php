<?php 
global $wpdb;
$_GET = stripslashes_deep($_GET);
$hc_hmw_message = '';
if(isset($_GET['hc_hmw_msg'])){
	$hc_hmw_message = $_GET['hc_hmw_msg'];
}
if($hc_hmw_message == 1){

	?>
<div class="system_notice_area_style1" id="system_notice_area">
Widget shortcode successfully created.&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($hc_hmw_message == 2){

	?>
<div class="system_notice_area_style0" id="system_notice_area">
Widget shortcode not found.&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($hc_hmw_message == 3){

	?>
<div class="system_notice_area_style1" id="system_notice_area">
Widget shortcode successfully deleted.&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($hc_hmw_message == 4){

	?>
<div class="system_notice_area_style1" id="system_notice_area">
Widget shortcode status successfully changed.&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($hc_hmw_message == 5){

	?>
<div class="system_notice_area_style1" id="system_notice_area">
Widget shortcode successfully updated.&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
?>


<div >


	<form method="post">
		<fieldset
			style="width: 99%; border: 0px solid #F7F7F7; padding: 10px 0px;">
			<legend><h3>HealCode MINDBODY Widgets</h3></legend>
			<?php 
			global $wpdb;
			$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
			$limit = get_option('hc_hmw_limit');			
			$offset = ( $pagenum - 1 ) * $limit;
			
			
			$entries = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."hc_hmw_short_code  ORDER BY id DESC LIMIT $offset,$limit" );
			
			?>
			<input  id="submit_hmw"
				style="cursor: pointer; margin-bottom:10px; margin-left:8px;" type="button"
				name="textFieldButton2" value="Add New Widget"
				 onClick='document.location.href="<?php echo admin_url('admin.php?page=insert-html-short-manage&action=snippet-add');?>"'>
			<table class="widefat hc-short" style="width: 99%; margin: 0 auto; border-bottom:none;">
				<thead>
					<tr>
						<th scope="col" >Widget Title</th>
						<th scope="col" >Widget Shortcode</th>
						<th scope="col" >Status</th>
						<th scope="col" colspan="3" style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if( count($entries)>0 ) {
						$count=1;
						$class = '';
						foreach( $entries as $entry ) {
							$class = ( $count % 2 == 0 ) ? ' class="alternate"' : '';
							?>
					<tr <?php echo $class; ?>>
						<td><?php 
						echo esc_html($entry->title);
						?></td>
						<td><?php 
						if($entry->status == 2){echo 'NA';}
						else
						echo '[hc-hmw snippet="'.esc_html($entry->title).'"]';
						?></td>
						<td>
							<?php 
								if($entry->status == 2){
									echo "Inactive";	
								}elseif ($entry->status == 1){
								echo "Active";	
								}
							
							?>
						</td>
						<?php 
								if($entry->status == 2){
						?>
						<td style="text-align: center;"><a
							href='<?php echo admin_url('admin.php?page=insert-html-short-manage&action=snippet-status&snippetId='.$entry->id.'&status=1&pageno='.$pagenum); ?>'><img
								id="img" title="Activate"
								src="<?php echo plugins_url('healcode-mindbody-widget/images/activate.png')?>">
						</a>
						</td>
							<?php 
								}elseif ($entry->status == 1){
								?>
						<td style="text-align: center;"><a
							href='<?php echo admin_url('admin.php?page=insert-html-short-manage&action=snippet-status&snippetId='.$entry->id.'&status=2&pageno='.$pagenum); ?>'><img
								id="img" title="Deactivate"
								src="<?php echo plugins_url('healcode-mindbody-widget/images/pause.png')?>">
						</a>
						</td>		
								<?php 	
								}
							
							?>
						
						<td style="text-align: center;"><a
							href='<?php echo admin_url('admin.php?page=insert-html-short-manage&action=snippet-edit&snippetId='.$entry->id.'&pageno='.$pagenum); ?>'><img
								id="img" title="Edit Widget"
								src="<?php echo plugins_url('healcode-mindbody-widget/images/edit.png')?>">
						</a>
						</td>
						<td style="text-align: center;" ><a
							href='<?php echo admin_url('admin.php?page=insert-html-short-manage&action=snippet-delete&snippetId='.$entry->id.'&pageno='.$pagenum); ?>'
							onclick="javascript: return confirm('Please click \'OK\' to confirm ');"><img
								id="img" title="Delete Widget"
								src="<?php echo plugins_url('healcode-mindbody-widget/images/delete.png')?>">
						</a></td>
					</tr>
					<?php
					$count++;
						}
					} else { ?>
					<tr>
						<td colspan="6" >Widget shortcodes not found</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			
			<input  id="submit_hmw"
				style="cursor: pointer; margin-top:10px;margin-left:8px;" type="button"
				name="textFieldButton2" value="Add New Widget"
				 onClick='document.location.href="<?php echo admin_url('admin.php?page=insert-html-short-manage&action=snippet-add');?>"'>
			
			<?php
			$total = $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."hc_hmw_short_code" );
			$num_of_pages = ceil( $total / $limit );

			$page_links = paginate_links( array(
					'base' => add_query_arg( 'pagenum','%#%'),
				    'format' => '',
				    'prev_text' =>  '&laquo;',
				    'next_text' =>  '&raquo;',
				    'total' => $num_of_pages,
				    'current' => $pagenum
			) );



			if ( $page_links ) {
				echo '<div class="tablenav" style="width:99%"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
			}

			?>

		</fieldset>

	</form>

</div>

