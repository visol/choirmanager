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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Choirmanager_Domain_Model_CustomFrontendUser.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Choir Manager
 *
 * @author Lorenz Ulrich <lorenz.ulrich@visol.ch>
 */
class Tx_Choirmanager_Domain_Model_CustomFrontendUserTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Choirmanager_Domain_Model_CustomFrontendUser
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Choirmanager_Domain_Model_CustomFrontendUser();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getBirthdateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setBirthdateForDateTimeSetsBirthdate() { }
	
	/**
	 * @test
	 */
	public function getJobReturnsInitialValueForTx_Choirmanager_Domain_Model_Job() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getJob()
		);
	}

	/**
	 * @test
	 */
	public function setJobForTx_Choirmanager_Domain_Model_JobSetsJob() { 
		$dummyObject = new Tx_Choirmanager_Domain_Model_Job();
		$this->fixture->setJob($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getJob()
		);
	}
	
	/**
	 * @test
	 */
	public function getMembershipPeriodReturnsInitialValueForObjectStorageContainingTx_Choirmanager_Domain_Model_MembershipPeriod() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getMembershipPeriod()
		);
	}

	/**
	 * @test
	 */
	public function setMembershipPeriodForObjectStorageContainingTx_Choirmanager_Domain_Model_MembershipPeriodSetsMembershipPeriod() { 
		$membershipPeriod = new Tx_Choirmanager_Domain_Model_MembershipPeriod();
		$objectStorageHoldingExactlyOneMembershipPeriod = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneMembershipPeriod->attach($membershipPeriod);
		$this->fixture->setMembershipPeriod($objectStorageHoldingExactlyOneMembershipPeriod);

		$this->assertSame(
			$objectStorageHoldingExactlyOneMembershipPeriod,
			$this->fixture->getMembershipPeriod()
		);
	}
	
	/**
	 * @test
	 */
	public function addMembershipPeriodToObjectStorageHoldingMembershipPeriod() {
		$membershipPeriod = new Tx_Choirmanager_Domain_Model_MembershipPeriod();
		$objectStorageHoldingExactlyOneMembershipPeriod = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneMembershipPeriod->attach($membershipPeriod);
		$this->fixture->addMembershipPeriod($membershipPeriod);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneMembershipPeriod,
			$this->fixture->getMembershipPeriod()
		);
	}

	/**
	 * @test
	 */
	public function removeMembershipPeriodFromObjectStorageHoldingMembershipPeriod() {
		$membershipPeriod = new Tx_Choirmanager_Domain_Model_MembershipPeriod();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($membershipPeriod);
		$localObjectStorage->detach($membershipPeriod);
		$this->fixture->addMembershipPeriod($membershipPeriod);
		$this->fixture->removeMembershipPeriod($membershipPeriod);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getMembershipPeriod()
		);
	}
	
	/**
	 * @test
	 */
	public function getProjectParticipationReturnsInitialValueForObjectStorageContainingTx_Choirmanager_Domain_Model_ProjectParticipation() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getProjectParticipation()
		);
	}

	/**
	 * @test
	 */
	public function setProjectParticipationForObjectStorageContainingTx_Choirmanager_Domain_Model_ProjectParticipationSetsProjectParticipation() { 
		$projectParticipation = new Tx_Choirmanager_Domain_Model_ProjectParticipation();
		$objectStorageHoldingExactlyOneProjectParticipation = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneProjectParticipation->attach($projectParticipation);
		$this->fixture->setProjectParticipation($objectStorageHoldingExactlyOneProjectParticipation);

		$this->assertSame(
			$objectStorageHoldingExactlyOneProjectParticipation,
			$this->fixture->getProjectParticipation()
		);
	}
	
	/**
	 * @test
	 */
	public function addProjectParticipationToObjectStorageHoldingProjectParticipation() {
		$projectParticipation = new Tx_Choirmanager_Domain_Model_ProjectParticipation();
		$objectStorageHoldingExactlyOneProjectParticipation = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneProjectParticipation->attach($projectParticipation);
		$this->fixture->addProjectParticipation($projectParticipation);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneProjectParticipation,
			$this->fixture->getProjectParticipation()
		);
	}

	/**
	 * @test
	 */
	public function removeProjectParticipationFromObjectStorageHoldingProjectParticipation() {
		$projectParticipation = new Tx_Choirmanager_Domain_Model_ProjectParticipation();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($projectParticipation);
		$localObjectStorage->detach($projectParticipation);
		$this->fixture->addProjectParticipation($projectParticipation);
		$this->fixture->removeProjectParticipation($projectParticipation);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getProjectParticipation()
		);
	}
	
}
?>