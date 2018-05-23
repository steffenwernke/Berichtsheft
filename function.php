<?php
	
function logout(){
	 session_destroy();
}
function br2nl ( $string )
{
    return preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $string);
}

?>
