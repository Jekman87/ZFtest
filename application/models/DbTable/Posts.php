<?php

class Application_Model_DbTable_Posts extends Zend_Db_Table_Abstract
{

    protected $_name = 'posts';

    public function getPostsByArray()
    {
        return $this->fetchAll()->toArray();
    }

    public function getPostsByPaginatorAdapter()
    {
        return new Zend_Paginator_Adapter_DbSelect($this->select());
    }

}

