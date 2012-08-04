<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence;



/**
 *	Base class for a Provider.
 *
 *	@package Essence
 */

abstract class Provider {

	/**
	 *	A regular expression that doesn't match anything.
	 *
	 *	@var string 
	 */

	const nothing = '#(?=a)b#';



	/**
	 *	A regular expression used to determine if an URL can be handled by the
	 *	provider.
	 *
	 *	@var string
	 */

	protected $_pattern = '';



	/**
	 *	Constructs the Provider with a regular expression to match the URLs 
	 *	it can handle.
	 *
	 *	@param string $pattern The regular expression.
	 */

	public function __construct( $pattern = Provider::nothing ) {

		$this->_pattern = $pattern;
	}



	/**
	 *	Tells if the provider can fetch embed informations from the given URL.
	 *
	 *	@param string $url URL to fetch informations from.
	 */

	public function canFetch( $url ) {

		return preg_match( $this->_pattern, $url );
	}



	/**
	 *	Fetches embed information from the given URL.
	 *
	 *	@param string $url URL to fetch informations from.
	 *	@return \Essence\Embed Embed informations.
	 */

	public final function fetch( $url ) {

		$url = $this->_prepare( trim( $url ));
		$data = $this->_fetch( $url );

		if ( is_array( $data ) && !isset( $data['url'])) {
			$data['url'] = $url;
		}

		return $data;
	}



	/**
	 *	Prepares an URL before fetching its contents. This method can be 
	 *	overloaded in subclasses to do some preprocessing.
	 *
	 *	@param string $url URL to prepare.
	 *	@return string Prepared URL.
	 */

	protected function _prepare( $url ) {

		return $url;
	}



	/**
	 *	Does the actual fetching of informations.
	 *
	 *	@param string $url URL to fetch informations from.
	 *	@return \Essence\Embed Embed informations.
	 */

	abstract protected function _fetch( $url );

}
