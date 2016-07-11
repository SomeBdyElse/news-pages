<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Newslist',
    'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xlf:tt_content.list_type.newspages_newslist'
);

// Add flexform for newslist plugin
$pluginKey = 'newspages_newslist';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginKey]='layout,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginKey]='pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginKey, 'FILE:EXT:news_pages/Configuration/FlexForms/newslist.xml');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'News Pages');
