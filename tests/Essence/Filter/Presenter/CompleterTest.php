<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Filter\Presenter;

use PHPUnit_Framework_TestCase as TestCase;
use Essence\Media;



/**
 *	Test case for Completer.
 */

class CompleterTest extends TestCase {

	/**
	 *
	 */

	public $Completer = null;



	/**
	 *
	 */

	public function setUp( ) {

		$this->Completer = new Completer([
			'foo' => 'bar'
		]);
	}



	/**
	 *
	 */

	public function testFilter( ) {

		$Media = new Media([ ]);
		$this->assertFalse( $Media->has( 'foo' ));

		$Media = $this->Completer->filter( $Media );
		$this->assertEquals( 'bar', $Media->get( 'foo' ));
	}
}
