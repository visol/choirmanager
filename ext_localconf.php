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

?>