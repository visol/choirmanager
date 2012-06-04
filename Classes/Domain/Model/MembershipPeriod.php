<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Lorenz Ulrich <lorenz.ulrich@visol.ch>, visol digitale Dienstleistungen GmbH
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
 * @package choirmanager
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Choirmanager_Domain_Model_MembershipPeriod extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Label
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $membershipPeriodLabel;

	/**
	 * Show from date
	 *
	 * @var DateTime
	 */
	protected $showFrom;

	/**
	 * Show to date
	 *
	 * @var DateTime
	 */
	protected $showTo;

	/**
	 * Returns the showFrom
	 *
	 * @return DateTime $showFrom
	 */
	public function getShowFrom() {
		return $this->showFrom;
	}

	/**
	 * Sets the showFrom
	 *
	 * @param DateTime $showFrom
	 * @return void
	 */
	public function setShowFrom($showFrom) {
		$this->showFrom = $showFrom;
	}

	/**
	 * Returns the membershipPeriodLabel
	 *
	 * @return string membershipPeriodLabel
	 */
	public function getMembershipPeriodLabel() {
		return $this->membershipPeriodLabel;
	}

	/**
	 * Sets the membershipPeriodLabel
	 *
	 * @param string $membershipPeriodLabel
	 * @return string membershipPeriodLabel
	 */
	public function setMembershipPeriodLabel($membershipPeriodLabel) {
		$this->membershipPeriodLabel = $membershipPeriodLabel;
	}

	/**
	 * Returns the showTo
	 *
	 * @return DateTime showTo
	 */
	public function getShowTo() {
		return $this->showTo;
	}

	/**
	 * Sets the showTo
	 *
	 * @param DateTime $showTo
	 * @return DateTime showTo
	 */
	public function setShowTo($showTo) {
		$this->showTo = $showTo;
	}

}
?>