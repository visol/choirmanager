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
 * Test case for class Tx_Choirmanager_Domain_Model_MembershipPeriod.
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
class Tx_Choirmanager_Domain_Model_MembershipPeriodTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Choirmanager_Domain_Model_MembershipPeriod
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Choirmanager_Domain_Model_MembershipPeriod();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getMembershipPeriodLabelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMembershipPeriodLabelForStringSetsMembershipPeriodLabel() { 
		$this->fixture->setMembershipPeriodLabel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMembershipPeriodLabel()
		);
	}
	
	/**
	 * @test
	 */
	public function getShowFromReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setShowFromForDateTimeSetsShowFrom() { }
	
	/**
	 * @test
	 */
	public function getShowToReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setShowToForDateTimeSetsShowTo() { }
	
}
?>