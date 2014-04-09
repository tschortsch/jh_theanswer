<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Theanswer',
	'Show Answer'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'THE ANSWER');

t3lib_extMgm::addLLrefForTCAdescr('tx_jhtheanswer_domain_model_answer', 'EXT:jh_theanswer/Resources/Private/Language/locallang_csh_tx_jhtheanswer_domain_model_answer.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jhtheanswer_domain_model_answer');
$TCA['tx_jhtheanswer_domain_model_answer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jh_theanswer/Resources/Private/Language/locallang_db.xml:tx_jhtheanswer_domain_model_answer',
		'label' => 'value',
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
		'searchFields' => 'value,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Answer.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jhtheanswer_domain_model_answer.gif'
	),
);

?>