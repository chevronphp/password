<?php

namespace Chevron\Password;

interface PasswordInterface {

	/**
	 * create a 60 char hash (including salt)
	 * @param string $password The plain text to use as a password
	 * @return string
	 */
	function create($password);

	/**
	 * given a plain text password, verify it hashes to the given hash
	 * @param string $password The plain text to verify
	 * @param string $hash The hash to compare it to
	 * @return bool
	 */
	function verify($password, $hash);

}