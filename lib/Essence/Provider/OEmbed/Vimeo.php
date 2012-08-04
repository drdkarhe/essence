<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Provider\OEmbed;



/**
 *	Vimeo Provider (http://vimeo.com).
 *
 *	@package Essence.Provider.OEmbed
 */

class Vimeo extends \Essence\Provider\OEmbed {

	/**
	 *	Constructor.
	 */

	public function __construct( ) {

		parent::__construct(
			'#vimeo\.com#i',
			'http://vimeo.com/api/oembed.json?url=%s'
		);
	}



	/**
	 *	Refactors URLs like these :
	 *		- http://player.vimeo.com/video/20830433
	 *
	 *	in such form :
	 *		- http://www.vimeo.com/20830433
	 *
	 *	@param string $url URL to refactor.
	 *	@return string Refactored URL.
	 */

	protected function _prepare( $url ) {

		if ( preg_match( "#player\.vimeo\.com/video/([0-9]+)#i", $url, $matches )) {
			return 'http://www.vimeo.com/' . $matches[ 1 ];
		}

		return $url;
	}
}
