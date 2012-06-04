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
class Tx_Choirmanager_Controller_MemberController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * memberRepository
	 *
	 * @var Tx_Choirmanager_Domain_Repository_MemberRepository
	 */
	protected $memberRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$members = $this->memberRepository->findAll();
		$this->view->assign('members', $members);
	}

	/**
	 * action show
	 *
	 * @param Tx_Choirmanager_Domain_Model_Member
	 * @return void
	 */
	public function showAction(Tx_Choirmanager_Domain_Model_Member $member) {
		$this->view->assign('member', $member);
	}

	/**
	 * action new
	 *
	 * @param Tx_Choirmanager_Domain_Model_Member
	 * @dontvalidate $newMember
	 * @return void
	 */
	public function newAction(Tx_Choirmanager_Domain_Model_Member $newMember = NULL) {
		$this->view->assign('newMember', $newMember);
	}

	/**
	 * action create
	 *
	 * @param Tx_Choirmanager_Domain_Model_Member
	 * @return void
	 */
	public function createAction(Tx_Choirmanager_Domain_Model_Member $newMember) {
		$this->memberRepository->add($newMember);
		$this->flashMessageContainer->add('Your new Member was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param Tx_Choirmanager_Domain_Model_Member
	 * @return void
	 */
	public function editAction(Tx_Choirmanager_Domain_Model_Member $member) {
		$this->view->assign('member', $member);
	}

	/**
	 * action update
	 *
	 * @param Tx_Choirmanager_Domain_Model_Member
	 * @return void
	 */
	public function updateAction(Tx_Choirmanager_Domain_Model_Member $member) {
		$this->memberRepository->update($member);
		$this->flashMessageContainer->add('Your Member was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param Tx_Choirmanager_Domain_Model_Member
	 * @return void
	 */
	public function deleteAction(Tx_Choirmanager_Domain_Model_Member $member) {
		$this->memberRepository->remove($member);
		$this->flashMessageContainer->add('Your Member was removed.');
		$this->redirect('list');
	}

	/**
	 * injectCustomFrontendUserRepository
	 *
	 * @param Tx_Choirmanager_Domain_Repository_MemberRepository $MemberRepository
	 * @return void
	 */
	public function injectMemberRepository(Tx_Choirmanager_Domain_Repository_MemberRepository $memberRepository) {
		$this->memberRepository = $memberRepository;
	}

}
?>