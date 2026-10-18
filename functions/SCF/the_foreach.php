<?php

function the_foreach($list, $callback, $options = '')
{
	if (have_rows($list, $options)) {
		while (have_rows($list, $options)) {
			the_row();
			if (is_callable($callback)) {
				call_user_func($callback);
			}
		}
	}
}
?>