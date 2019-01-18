<?php
class Application_View_Helper_LastPosts extends Zend_View_Helper_Abstract
{
    public function lastPosts()
    {
        $postsModel = new Application_Model_DbTable_Posts();

        return $this->view->partialLoop('last-posts.phtml', $postsModel->getLastPosts());
    }
}