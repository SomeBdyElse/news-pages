<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'HannesLau.' . $_EXTKEY,
    'Newslist',
    [
        'NewsItem' => 'list',
    ],
    []
);

/*
 * Add icons for the news page type
 */
$doktype = 50;
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
foreach(array('default', 'hideinmenu') as $status) {
    $iconId = 'apps-pagetree-doktype' . $doktype . '-' . $status;
    $iconPath = 'EXT:news_pages/Resources/Backend/Icons/Doktypes/' . $iconId . '.svg';
    $iconRegistry->registerIcon($iconId, \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, array('source' => $iconPath));
}

