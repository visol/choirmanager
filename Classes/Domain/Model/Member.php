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
class Tx_Choirmanager_Domain_Model_Member extends Tx_Extbase_Domain_Model_FrontendUser {

	/**
	 * Date of birth
	 *
	 * @var DateTime
	 */
	protected $birthdate;

	/**
	 * Job
	 *
	 * @lazy
	 * @var Tx_Choirmanager_Domain_Model_Job
	 */
	protected $job;

	/**
	 * Voicetype
	 *
	 * @lazy
	 * @var Tx_Choirmanager_Domain_Model_Voicetype
	 */
	protected $voicetype;

	/**
	 * Membership period
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Choirmanager_Domain_Model_MembershipPeriod>
	 */
	protected $membershipPeriod;

	/**
	 * Project participation
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Choirmanager_Domain_Model_ProjectParticipation>
	 */
	protected $projectParticipation;



	/**
	 * Returns the birthdate
	 *
	 * @return DateTime $birthdate
	 */
	public function getBirthdate() {
		return $this->birthdate;
	}

	/**
	 * Sets the birthdate
	 *
	 * @param DateTime $birthdate
	 * @return void
	 */
	public function setBirthdate($birthdate) {
		$this->birthdate = $birthdate;
	}

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
		parent::__construct();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->membershipPeriod = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->projectParticipation = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Adds a MembershipPeriod
	 *
	 * @param Tx_Choirmanager_Domain_Model_MembershipPeriod $membershipPeriod
	 * @return void
	 */
	public function addMembershipPeriod(Tx_Choirmanager_Domain_Model_MembershipPeriod $membershipPeriod) {
		$this->membershipPeriod->attach($membershipPeriod);
	}

	/**
	 * Removes a MembershipPeriod
	 *
	 * @param Tx_Choirmanager_Domain_Model_MembershipPeriod $membershipPeriodToRemove The MembershipPeriod to be removed
	 * @return void
	 */
	public function removeMembershipPeriod(Tx_Choirmanager_Domain_Model_MembershipPeriod $membershipPeriodToRemove) {
		$this->membershipPeriod->detach($membershipPeriodToRemove);
	}

	/**
	 * Returns the membershipPeriod
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Choirmanager_Domain_Model_MembershipPeriod> $membershipPeriod
	 */
	public function getMembershipPeriod() {
		return $this->membershipPeriod;
	}

	/**
	 * Sets the membershipPeriod
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Choirmanager_Domain_Model_MembershipPeriod> $membershipPeriod
	 * @return void
	 */
	public function setMembershipPeriod(Tx_Extbase_Persistence_ObjectStorage $membershipPeriod) {
		$this->membershipPeriod = $membershipPeriod;
	}

	/**
	 * Adds a ProjectParticipation
	 *
	 * @param Tx_Choirmanager_Domain_Model_ProjectParticipation $projectParticipation
	 * @return void
	 */
	public function addProjectParticipation(Tx_Choirmanager_Domain_Model_ProjectParticipation $projectParticipation) {
		$this->projectParticipation->attach($projectParticipation);
	}

	/**
	 * Removes a ProjectParticipation
	 *
	 * @param Tx_Choirmanager_Domain_Model_ProjectParticipation $projectParticipationToRemove The ProjectParticipation to be removed
	 * @return void
	 */
	public function removeProjectParticipation(Tx_Choirmanager_Domain_Model_ProjectParticipation $projectParticipationToRemove) {
		$this->projectParticipation->detach($projectParticipationToRemove);
	}

	/**
	 * Returns the projectParticipation
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Choirmanager_Domain_Model_ProjectParticipation> $projectParticipation
	 */
	public function getProjectParticipation() {
		return $this->projectParticipation;
	}

	/**
	 * Sets the projectParticipation
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Choirmanager_Domain_Model_ProjectParticipation> $projectParticipation
	 * @return void
	 */
	public function setProjectParticipation(Tx_Extbase_Persistence_ObjectStorage $projectParticipation) {
		$this->projectParticipation = $projectParticipation;
	}

	/**
	 * Returns the job
	 *
	 * @return Tx_Choirmanager_Domain_Model_Job $job
	 */
	public function getJob() {
		return $this->job;
	}

	/**
	 * Sets the job
	 *
	 * @param Tx_Choirmanager_Domain_Model_Job $job
	 * @return void
	 */
	public function setJob(Tx_Choirmanager_Domain_Model_Job $job) {
		$this->job = $job;
	}

	/**
	 * Returns the voicetype
	 *
	 * @return Tx_Choirmanager_Domain_Model_Voicetype $voicetype
	 */
	public function getVoicetype() {
		return $this->voicetype;
	}

	/**
	 * Sets the voicetype
	 *
	 * @param Tx_Choirmanager_Domain_Model_Voicetype $voicetype
	 * @return void
	 */
	public function setVoicetype(Tx_Choirmanager_Domain_Model_Voicetype $voicetype) {
		$this->voicetype = $voicetype;
	}



}
?>