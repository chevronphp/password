<?php

namespace Chevron\Password;

class Bcrypt implements PasswordInterface {

	/**
	 * between 04 and 31 ... affects the speed
	 */
	protected $cost = 8;

	/**
	 * or PASSWORD_BCRYPT
	 */
	protected $algo = PASSWORD_DEFAULT;

	/**
	 * create a 60 char hash (including salt)
	 * @param string $password The plain text to use as a password
	 * @return string
	 */
	function create($password){
		return password_hash($password, $this->algo, ["cost" => $this->cost]);
	}

	/**
	 * given a plain text password, verify it hashes to the given hash
	 * @param string $password The plain text to verify
	 * @param string $hash The hash to compare it to
	 * @return bool
	 */
	function verify($password, $hash){
		return password_verify($password, $hash);
	}

	/**
	 * inspect a given hash and return information about it
	 * @param string $hash The hash to inspect
	 * @return array
	 */
	function info($hash){
		return password_get_info($hash);
	}

	/**
	 * check to see if the given hash meets the given criteria
	 * @param string $hash The hash to check
	 * @return bool
	 */
	function shouldRecreate($hash){
		return password_needs_rehash($hash, $this->algo, ["cost" => $this->cost]);
	}

	/**
	 * change the cost when hashing
	 */
	function setCost($int){
		$this->cost = $int;
	}

}