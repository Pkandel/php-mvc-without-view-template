<?php
echo "hello from home controller and about method";
echo '<p> Query string parameters: <pre>'.
	htmlspecialchars(print_r($_GET, true)).'</pre></p>';
