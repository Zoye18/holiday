<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| EMAIL CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to send email
| 
| All options and settings are found here:
| https://codeigniter.com/user_guide/libraries/email.html
|
| -------------------------------------------------------------------
*/

// 'mail'/'sendmail'/smtp
$config['protocol'] = 'mail';
// where sendmail lives
$config['mailpath'] = '/usr/sbin/sendmail';
// character set
$config['charset'] = 'iso-8859-1';
// wrap the wording
$config['wordwrap'] = TRUE;
// text or HTML
$config['mailtype'] = 'html';

