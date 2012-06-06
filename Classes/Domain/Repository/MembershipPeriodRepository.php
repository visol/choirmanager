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
class Tx_Choirmanager_Domain_Repository_MembershipPeriodRepository extends Tx_Extbase_Persistence_Repository {

	/**
	* @var Tx_Extbase_Configuration_ConfigurationManagerInterface
	*/
	protected $configurationManager;

	/**
	* @param Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager
	* @return void
	*/
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
	}

	/**
	 * Returns all artists that are like a search term
	 *
	 * @return array An array of objects, empty if no objects found
	 * @api
	 */
	public function findAllTheMemberDidNotSetAlready($uidMember) {

		$query = $this->createQuery();

			// Storage PID
		$frameworkConfiguration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$storagePid = $frameworkConfiguration['persistence']['storagePid'];

		$query->statement("
			SELECT DISTINCT mp.uid, mp.*, ps.uid_member
			FROM tx_choirmanager_domain_model_membershipperiod as mp
			LEFT JOIN tx_choirmanager_domain_model_periodsubscription as ps
			ON mp.uid = ps.uid_period
			WHERE (mp.pid=" . $storagePid . " AND mp.deleted = 0 AND mp.hidden = 0)
			AND ps.uid_member !=" . $uidMember . " AND ps.uid_member IS NULL
		");

		return $query->execute();

	}

}
?>