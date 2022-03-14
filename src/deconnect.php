<?php  

include(__DIR__."/../LinkFive_id.php");

unlink('body.json');
unlink('bodyEmail.json');
unlink('bodyId.json');
unlink('bodyPosts.json');

header('Location: '.$url.$_SERVER['SERVER_NAME'].'/wp-admin/admin.php?page=PluginLinkedIn%2Fincludes%2Fwplf-first-page.php');
exit();