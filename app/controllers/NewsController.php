<?php

 use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class NewsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()

    {
       $currentPage = (int) $_GET["page"];
       $limit = (int) $_GET["limit"];
       if (empty($currentPage)) {
           $currentPage = 1;
       }
       if (empty($limit)) {
           $limit = 5;
       }
       $news = News::find();
       $paginator = new PaginatorModel(
           [
                "data"  => $news,
                "limit" => $limit,
                "page"  => $currentPage,
            ]
        );
        $this->view->page = $paginator->getPaginate();
        $this->view->limit = $limit;
    }
}