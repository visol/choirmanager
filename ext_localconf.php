<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

	// Display member list
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'ListMembers',
	array(
		'Member' => 'list',
	),
	// non-cacheable actions
	array(
	)
);

	// Edit project subscription
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'EditSubscriptions',
	array(
		'Member' => 'editSubscriptions, updateSubscriptions, exitSubscriptions',
	),
	// non-cacheable actions
	array(
		'Member' => 'editSubscriptions, updateSubscriptions'
	)
);

	// Edit period subscription
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'EditPeriods',
	array(
		'Member' => 'editPeriods, updatePeriods, exitPeriods',
	),
	// non-cacheable actions
	array(
		'Member' => 'editPeriods, updatePeriods'
	)
);

?>