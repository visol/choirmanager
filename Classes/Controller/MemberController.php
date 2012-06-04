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
	 * projectParticipationRepository
	 *
	 * @var Tx_Choirmanager_Domain_Repository_ProjectParticipationRepository
	 */
	protected $projectParticipationRepository;

	/**
	 * projectSubscriptionRepository
	 *
	 * @var Tx_Choirmanager_Domain_Repository_ProjectSubscriptionRepository
	 */
	protected $projectSubscriptionRepository;

	/**
	 * membershipPeriodRepository
	 *
	 * @var Tx_Choirmanager_Domain_Repository_MembershipPeriodRepository
	 */
	protected $membershipPeriodRepository;

	/**
	 * periodSubscriptionRepository
	 *
	 * @var Tx_Choirmanager_Domain_Repository_PeriodSubscriptionRepository
	 */
	protected $periodSubscriptionRepository;

	/**
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;

	/**
	 * Inject Persistence Manager
	 *
	 * @param Tx_Extbase_Persistence_Manager $persistenceManager
	 * @return void
	 */
	public function injectPersistenceManager(Tx_Extbase_Persistence_Manager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}

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
	 * action editSubscriptions
	 *
	 * @return void
	 */
	public function editSubscriptionsAction() {

			// uid of member/frontend user
		$uidMember = (int)$GLOBALS['TSFE']->fe_user->user['uid'];
		$projects = $this->projectParticipationRepository->findAllTheMemberDidNotSetAlready($uidMember);

		$this->view->assign('projects', $projects);
	}

	/**
	 * action updateSubscriptions
	 *
	 * @return void
	 */
	public function updateSubscriptionsAction() {

			// uid of member/frontend user
		$uidMember = (int)$GLOBALS['TSFE']->fe_user->user['uid'];

		$arguments = $this->request->getArgument('tx_choirmanager');
		if (is_array($arguments['projectSubscription'])) {
			$projectSubscriptions = $arguments['projectSubscription'];
			foreach ($projectSubscriptions as $uidProject => $projectSubscription) {
				$status = $projectSubscription['status'];

				/** @var $projectSubscriptionRecord Tx_Choirmanager_Domain_Model_ProjectSubscription */
				$projectSubscriptionRecord = $this->objectManager->create('Tx_Choirmanager_Domain_Model_ProjectSubscription');
				$projectSubscriptionRecord->setUidProject($uidProject);
				$projectSubscriptionRecord->setUidMember($uidMember);
				$projectSubscriptionRecord->setStatus($status);
				$this->projectSubscriptionRepository->add($projectSubscriptionRecord);
				//debug('project: ' . $uidProject . '/member: ' . $uidMember . '/status: ' . $status);
			}
		}
		$this->flashMessageContainer->add('Projektan/-abmeldung gespeichert.');

		$this->redirect('exitSubscriptions');

	}

	/**
	 * action exitSubscriptions
	 *
	 * @return void
	 */
	public function exitSubscriptionsAction() {
	}

	/**
	 * action editPeriods
	 *
	 * @return void
	 */
	public function editPeriodsAction() {

			// uid of member/frontend user
		$uidMember = (int)$GLOBALS['TSFE']->fe_user->user['uid'];
		$periods = $this->membershipPeriodRepository->findAllTheMemberDidNotSetAlready($uidMember);

		$this->view->assign('periods', $periods);
	}

	/**
	 * action updatePeriods
	 *
	 * @return void
	 */
	public function updatePeriodsAction() {

			// uid of member/frontend user
		$uidMember = (int)$GLOBALS['TSFE']->fe_user->user['uid'];

		$arguments = $this->request->getArgument('tx_choirmanager');
		if (is_array($arguments['periodSubscription'])) {
			$periodSubscriptions = $arguments['periodSubscription'];
			foreach ($periodSubscriptions as $uidPeriod => $periodSubscription) {
				$status = $periodSubscription['status'];

				/** @var $periodSubscriptionRecord Tx_Choirmanager_Domain_Model_PeriodSubscription */
				$periodSubscriptionRecord = $this->objectManager->create('Tx_Choirmanager_Domain_Model_PeriodSubscription');
				$periodSubscriptionRecord->setUidPeriod($uidPeriod);
				$periodSubscriptionRecord->setUidMember($uidMember);
				$periodSubscriptionRecord->setStatus($status);
				$this->periodSubscriptionRepository->add($periodSubscriptionRecord);
				//debug('project: ' . $uidProject . '/member: ' . $uidMember . '/status: ' . $status);
			}
		}

		$this->flashMessageContainer->add('Semesteran/-abmeldung gespeichert.');

		$this->redirect('exitPeriods');

	}

	/**
	 * action exitPeriods
	 *
	 * @return void
	 */
	public function exitPeriodsAction() {
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

	/**
	 * injectProjectParticipationRepository
	 *
	 * @param Tx_Choirmanager_Domain_Repository_ProjectParticipationRepository $projectParticipationRepository
	 * @return void
	 */
	public function injectProjectParticipationRepository(Tx_Choirmanager_Domain_Repository_ProjectParticipationRepository $projectParticipationRepository) {
		$this->projectParticipationRepository = $projectParticipationRepository;
	}

	/**
	 * injectProjectSubscriptionRepository
	 *
	 * @param Tx_Choirmanager_Domain_Repository_ProjectSubscriptionRepository $projectSubscriptionRepository
	 * @return void
	 */
	public function injectProjectSubscriptionRepository(Tx_Choirmanager_Domain_Repository_ProjectSubscriptionRepository $projectSubscriptionRepository) {
		$this->projectSubscriptionRepository = $projectSubscriptionRepository;
	}

	/**
	 * injectMembershipPeriodRepository
	 *
	 * @param Tx_Choirmanager_Domain_Repository_MembershipPeriodRepository $membershipPeriodRepository
	 * @return void
	 */
	public function injectMembershipPeriodRepository(Tx_Choirmanager_Domain_Repository_MembershipPeriodRepository $membershipPeriodRepository) {
		$this->membershipPeriodRepository = $membershipPeriodRepository;
	}

	/**
	 * injectPeriodSubscriptionRepository
	 *
	 * @param Tx_Choirmanager_Domain_Repository_PeriodSubscriptionRepository $periodSubscriptionRepository
	 * @return void
	 */
	public function injectPeriodSubscriptionRepository(Tx_Choirmanager_Domain_Repository_PeriodSubscriptionRepository $periodSubscriptionRepository) {
		$this->periodSubscriptionRepository = $periodSubscriptionRepository;
	}

}
?>