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
class Tx_Choirmanager_Domain_Model_ProjectSubscription extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * uid of member
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $uidMember;

	/**
	 * uid of project
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $uidProject;

	/**
	 * status of subscription: 0 for don't subscribe, 1 for subscribe
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $status;

	/**
	 * Returns the uidMember
	 *
	 * @return integer uidMember
	 */
	public function getUidMember() {
		return $this->uidMember;
	}

	/**
	 * Sets the uidMember
	 *
	 * @param integer $uidMember
	 * @return void
	 */
	public function setUidMember($uidMember) {
		$this->uidMember = $uidMember;
	}

	/**
	 * Returns the uidProject
	 *
	 * @return integer uidProject
	 */
	public function getUidProject() {
		return $this->uidProject;
	}

	/**
	 * Sets the uidProject
	 *
	 * @param integer $uidProject
	 * @return void
	 */
	public function setUidProject($uidProject) {
		$this->uidProject = $uidProject;
	}

	/**
	 * Returns the status
	 *
	 * @return integer status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Sets the status
	 *
	 * @param integer $status
	 * @return void
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

}
?>