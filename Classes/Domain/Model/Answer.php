<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Juerg Hunziker <juerg.hunziker@gmail.com>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package jh_theanswer
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_JhTheanswer_Domain_Model_Answer extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * value
	 *
	 * @var integer
	 */
	protected $value;

	/**
	 * Returns the value
	 *
	 * @return integer $value
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Sets the value
	 *
	 * @param integer $value
	 * @return void
	 */
	public function setValue($value) {
		$this->value = $value;
	}

}
?>