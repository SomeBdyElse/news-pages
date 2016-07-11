<?php


namespace HannesLau\NewsPages\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class NewsItemRepository extends Repository
{
    /**
     * @override
     */
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @param int $number
     * @param boolean $topNewsOnly
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findNewest($number, $topNewsOnly) {
        $query = $this->createQuery();

        if($number > 0) {
            $query->setLimit($number);
        }
        if($topNewsOnly) {
            $query->matching($query->equals('topNews', 1));
        }

        return $query->execute();
    }
}
