<?php
$_SESSION = array();
session_destroy;
echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
?>