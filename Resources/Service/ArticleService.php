<?php

namespace Resources\Service;

use Resources\Model\ArticleModel;

class ArticleService {

    const PER_PAGE = 5;

    protected $article_model;

    public function __construct(ArticleModel $article_model) {
        $this->article_model = $article_model;
    }

    public function getAll($columns = '*') {
        $query = $this->article_model
            ->getConnection()
            ->createQueryBuilder()
            ->select($columns)
            ->from($this->article_model->getTable())
        ;
        return $this->article_model->getConnection()->executeQuery($query)->fetchAll();
    }

    public function getById($id, $columns = '*') {
        $query = $this->article_model
            ->getConnection()
            ->createQueryBuilder()
            ->select($columns)
            ->from($this->article_model->getTable())
            ->where('id = ?')
        ;
        return $this->article_model->getConnection()->executeQuery($query, array($id))->fetchAll();
    }

    public function deleteById($id) {
        $query = $this->article_model
            ->getConnection()
            ->createQueryBuilder()
            ->delete($this->article_model->getTable())
            ->where('id = ?')
        ;
    }

    public function paginate() {
        $total_articles = count($this->getAll());

        return ceil($total_articles / self::PER_PAGE);
    }

    public function pageNum($page = 1, $columns = '*') {
        $start_offset = ($page - 1) * self::PER_PAGE;

        $query = $this->article_model
            ->getConnection()
            ->createQueryBuilder()
            ->select($columns)
            ->from($this->article_model->getTable())
            //->setFirstResult( $start_offset ? $start_offset + 1 : $start_offset )
            ->setFirstResult( $start_offset )
            ->setMaxResults(self::PER_PAGE)
        ;
        return $this->article_model->getConnection()->executeQuery($query)->fetchAll();
    }

    //deleteById
    //insert
    //updateById
    //getSpecificCondition
    //getByColumns
    //deleteByColumns
    //deleteAllData
    //quotes
}
