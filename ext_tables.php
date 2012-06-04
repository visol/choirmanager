<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}



t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Choir Manager');

	// Profil bearbeiten im Frontend
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'ListMembers',
	'Choir Manager: List members'
);
	

t3lib_div::loadTCA('fe_users');
if (!isset($TCA['fe_users']['ctrl']['type'])) {
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$TCA['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$TCA['fe_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.tx_extbase_type.0','0'),
			),
			'size' => 1,
			'maxitems' => 1,
			'default' => 'Tx_Choirmanager_Member'
		)
	);
	t3lib_extMgm::addTCAcolumns('fe_users', $tempColumns, 1);
}


$TCA['fe_users']['types']['Tx_Choirmanager_Member']['showitem'] = $TCA['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'];
$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:fe_users.tx_extbase_type.Tx_Choirmanager_Member','Tx_Choirmanager_Member');
t3lib_extMgm::addToAllTCAtypes('fe_users', $TCA['fe_users']['ctrl']['type'],'','after:hidden');

	
	
			
				
$tmp_choirmanager_columns = array(

	'birthdate' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.birthdate',
		'config' => array(
			'type' => 'input',
			'size' => 12,
			'max' => 20,
			'eval' => 'date',
			'checkbox' => 1,
			'default' => 0
		),
	),
	'job' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.job',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_choirmanager_domain_model_job',
			//'foreign_field' => 'member',
			'maxitems'      => 1,
		),
	),
	'voicetype' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.voicetype',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_choirmanager_domain_model_voicetype',
			'maxitems'      => 1,
		),
	),
	'membership_period' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.membership_period',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_choirmanager_domain_model_membershipperiod',
			'MM' => 'tx_choirmanager_member_membershipperiod_mm',
			'size' => 10,
			'autoSizeMax' => 30,
			'maxitems' => 9999,
			'multiple' => 0,
			'wizards' => array(
				'_PADDING' => 1,
				'_VERTICAL' => 1,
				'edit' => array(
					'type' => 'popup',
					'title' => 'Edit',
					'script' => 'wizard_edit.php',
					'icon' => 'edit2.gif',
					'popup_onlyOpenIfSelected' => 1,
					'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				'add' => Array(
					'type' => 'script',
					'title' => 'Create new',
					'icon' => 'add.gif',
					'params' => array(
						'table' => 'tx_choirmanager_domain_model_membershipperiod',
						'pid' => '###CURRENT_PID###',
						'setValue' => 'prepend'
						),
					'script' => 'wizard_add.php',
				),
			),
		),
	),
	'project_participation' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member.project_participation',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'tx_choirmanager_domain_model_projectparticipation',
			'MM' => 'tx_choirmanager_member_projectparticipation_mm',
			'size' => 10,
			'autoSizeMax' => 30,
			'maxitems' => 9999,
			'multiple' => 0,
			'wizards' => array(
				'_PADDING' => 1,
				'_VERTICAL' => 1,
				'edit' => array(
					'type' => 'popup',
					'title' => 'Edit',
					'script' => 'wizard_edit.php',
					'icon' => 'edit2.gif',
					'popup_onlyOpenIfSelected' => 1,
					'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					),
				'add' => Array(
					'type' => 'script',
					'title' => 'Create new',
					'icon' => 'add.gif',
					'params' => array(
						'table' => 'tx_choirmanager_domain_model_projectparticipation',
						'pid' => '###CURRENT_PID###',
						'setValue' => 'prepend'
						),
					'script' => 'wizard_add.php',
				),
			),
		),
	),
);


t3lib_extMgm::addTCAcolumns('fe_users',$tmp_choirmanager_columns);

$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:fe_users.tx_extbase_type.Tx_Choirmanager_Member','Tx_Choirmanager_Member');


$TCA['fe_users']['types']['Tx_Choirmanager_Member']['showitem'] = $TCA['fe_users']['types']['Tx_Extbase_Domain_Model_FrontendUser']['showitem'];
$TCA['fe_users']['types']['Tx_Choirmanager_Member']['showitem'] .= ',--div--;LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_member,';
$TCA['fe_users']['types']['Tx_Choirmanager_Member']['showitem'] .= 'birthdate, job, voicetype, membership_period, project_participation';

			
		

	
	
			t3lib_extMgm::addLLrefForTCAdescr('tx_choirmanager_domain_model_job', 'EXT:choirmanager/Resources/Private/Language/locallang_csh_tx_choirmanager_domain_model_job.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_choirmanager_domain_model_job');
			$TCA['tx_choirmanager_domain_model_job'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_job',
					'label' => 'job_label',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Job.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_choirmanager_domain_model_job.gif'
				),
			);
		

			t3lib_extMgm::addLLrefForTCAdescr('tx_choirmanager_domain_model_voicetype', 'EXT:choirmanager/Resources/Private/Language/locallang_csh_tx_choirmanager_domain_model_voicetype.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_choirmanager_domain_model_voicetype');
			$TCA['tx_choirmanager_domain_model_voicetype'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_voicetype',
					'label' => 'voicetype_label',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Voicetype.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_choirmanager_domain_model_voicetype.gif'
				),
			);



	
			t3lib_extMgm::addLLrefForTCAdescr('tx_choirmanager_domain_model_membershipperiod', 'EXT:choirmanager/Resources/Private/Language/locallang_csh_tx_choirmanager_domain_model_membershipperiod.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_choirmanager_domain_model_membershipperiod');
			$TCA['tx_choirmanager_domain_model_membershipperiod'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_membershipperiod',
					'label' => 'membership_period_label',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/MembershipPeriod.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_choirmanager_domain_model_membershipperiod.gif'
				),
			);
		

	
	
			t3lib_extMgm::addLLrefForTCAdescr('tx_choirmanager_domain_model_projectparticipation', 'EXT:choirmanager/Resources/Private/Language/locallang_csh_tx_choirmanager_domain_model_projectparticipation.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_choirmanager_domain_model_projectparticipation');
			$TCA['tx_choirmanager_domain_model_projectparticipation'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_projectparticipation',
					'label' => 'project_participation_label',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/ProjectParticipation.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_choirmanager_domain_model_projectparticipation.gif'
				),
			);
		

?>