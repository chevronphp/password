<?php

class BcryptTest extends PHPUnit_Framework_TestCase {

	function test_create(){

		$lib      = new Chevron\Password\Bcrypt;
		$password = 'totally-insecure-but-lengthy-password';
		$hash     = $lib->create($password);

		$this->assertEquals(60, strlen($hash));
	}

	function test_verify(){

		$lib           = new Chevron\Password\Bcrypt;
		$password      = 'totally-insecure-but-lengthy-password';
		$otherPassword = 'totally-awesome-password';
		$hash          = '$2y$08$M4o8vexTiZ9R6.gK8UJpleWq/7a8JgEGF9X3p0BT54zNF9APNcqUS';

		$this->assertEquals(false, $lib->verify($otherPassword, $hash));
		$this->assertEquals(true,  $lib->verify($password, $hash));
	}

	function test_info(){

		$lib  = new Chevron\Password\Bcrypt;

		$expected = [
			'algo'     => 1,
			'algoName' => 'bcrypt',
			'options'  => [ 'cost' => 8 ],
		];

		$hash = '$2y$08$M4o8vexTiZ9R6.gK8UJpleWq/7a8JgEGF9X3p0BT54zNF9APNcqUS';

		$this->assertEquals($expected, $lib->info($hash));
	}

	function test_shouldRecreate(){

		$lib  = new Chevron\Password\Bcrypt;
		$lib->setCost(12);

		$expected = '$2y$08$M4o8vexTiZ9R6.gK8UJpleWq/7a8JgEGF9X3p0BT54zNF9APNcqUS';
		$this->assertEquals(true, $lib->shouldRecreate($expected));
	}

}