<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_choirmanager_domain_model_periodsubscription'] = array(
	'ctrl' => $TCA['tx_choirmanager_domain_model_periodsubscription']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, uid_member, uid_period, status',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, uid_member, uid_period, status,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'uid_member' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_periodsubscription.uid_member',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'int'
			),
		),
		'uid_period' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_periodsubscription.uid_period',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'int'
			),
		),
		'status' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:choirmanager/Resources/Private/Language/locallang_db.xml:tx_choirmanager_domain_model_periodsubscription.status',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'int'
			),
		),

	),
);






?>