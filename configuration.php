<?php

	/* KONCEPT CONFIGURATION
	 * This file is a low level configuration file. If it's missing, we can't do anything with your koncept installation.
	 * Be careful, this file holds secret informations, such as your MySQL logins, your super-admin login and other things like that.
	 */

	$kcpt_config = new Konfig();

	/*
	 * Set the super-admin login informations
	 * The password is hashed is sha256.
	 */

	$kcpt_config->setSALogin('superadmin','');

	/*
	 * Set the databse informations
	 */

	$kcpt_config->setDBSettings('username','password','default','localhost','sauce');

?>