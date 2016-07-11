<?php


namespace HannesLau\NewsPages\Controller;


use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class NewsItemController extends ActionController
{
    /**
     * @var \HannesLau\NewsPages\Domain\Repository\NewsItemRepository
     * @inject
     */
    protected $newsItemRepository;

    public function listAction() {
        $limit = (int) $this->settings['number_of_elements'];
        $topNewsOnly = (bool) $this->settings['top_news_only'];
        $newsItems = $this->newsItemRepository->findNewest($limit, $topNewsOnly);

        $this->view->assignMultiple([
            'newsItems' => $newsItems,
        ]);
    }
}
