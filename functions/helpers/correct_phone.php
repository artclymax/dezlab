<?php
function correct_phone($phone)
{
	return str_replace(array(' ', '-', '+', '(', ')'), array('', '', '', '', ''), $phone);
}