<?php

global $wpdb;

$_POST = stripslashes_deep($_POST);
$_GET = stripslashes_deep($_GET);

$hc_hmw_snippetId = intval($_GET['snippetId']);
$hc_hmw_snippetStatus = intval($_GET['status']);
$hc_hmw_pageno = intval($_GET['pageno']);
if($hc_hmw_snippetId=="" || !is_numeric($hc_hmw_snippetId)){
	header("Location:".admin_url('admin.php?page=insert-html-short-manage'));
	exit();

}

$snippetCount = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'hc_hmw_short_code WHERE id=%d LIMIT 0,1' ,$hc_hmw_snippetId)) ;

if($snippetCount==0){
	header("Location:".admin_url('admin.php?page=insert-html-short-manage&hc_hmw_msg=2'));
	exit();
}else{
	
	$wpdb->update($wpdb->prefix.'hc_hmw_short_code', array('status'=>$hc_hmw_snippetStatus), array('id'=>$hc_hmw_snippetId));
	header("Location:".admin_url('admin.php?page=insert-html-short-manage&hc_hmw_msg=4&pagenum='.$hc_hmw_pageno));
	exit();
	
}
?>