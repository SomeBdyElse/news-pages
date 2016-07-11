<?php
defined('TYPO3_MODE') || die('Access denied.');

function addFieldsToPagesTable() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        [
            'news_teaser' => [
                'label' => 'LLL:EXT:news_pages/Resources/Private/Language/locallang_db.xlf:pages.news_teaser',
                'exclude' => 0,
                'l10n_mode' => 'exclude',
                'config' => [
                    'type' => 'text'
                ]
            ],
            'news_top_news' => [
                'label' => 'LLL:EXT:news_pages/Resources/Private/Language/locallang_db.xlf:pages.news_top_news',
                'exclude' => 0,
                'l10n_mode' => 'exclude',
                'config' => [
                    'type' => 'check'
                ]
            ],
            'news_preview_image' => [
                'label' => 'LLL:EXT:news_pages/Resources/Private/Language/locallang_db.xlf:pages.news_preview_image',
                'exclude' => 0,
                'l10n_mode' => 'exclude',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'news_preview_image',
                    [],
                    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                )
            ],

        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'news_teaser,news_top_news,news_preview_image',
        '50',
        'after:title'
    );
}

function addDoktype() {
    $doktype = 50;
    $icon = 'apps-pagetree-doktype' . $doktype . '-default';
    $iconHidden = 'apps-pagetree-doktype' . $doktype . '-hideinmenu';

    // Add the new doktype to the list of page types
    $GLOBALS['PAGES_TYPES'][$doktype] = array(
        'type' => 'web',
        'icon' => $icon,
        'allowedTables' => '*'
    );

    $label = 'LLL:EXT:news_pages/Resources/Private/Language/locallang_db.xlf:pages.doktype.' . $doktype;

    // Add the new doktype to the page type selector
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'pages',
        'doktype',
        [$label, (string) $doktype, $icon],
        '1',
        'after'
    );

    // add icon definitions
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][$doktype] = $icon;
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][$doktype . '-hideinmenu'] = $iconHidden;

    $GLOBALS['TCA']['pages']['types'][$doktype] = array(
        'showitem' => $GLOBALS['TCA']['pages']['types']['1']['showitem']
    );

    // Also add the new doktype to the page language overlays type selector (so that translations can inherit the same type)
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'pages_language_overlay',
        'doktype',
        [$label, (string) $doktype, $icon],
        '1',
        'after'
    );

    $GLOBALS['TCA']['pages_language_overlay']['types'][$doktype] = [
        'showitem' => $GLOBALS['TCA']['pages_language_overlay']['types']['1']['showitem']
    ];
}


addDoktype();
addFieldsToPagesTable();

