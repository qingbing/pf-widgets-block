<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-03-12
 * Version      :   1.0
 */

namespace Controllers;


use Render\Abstracts\Controller;

class SiteController extends Controller
{
    /**
     * @throws \Helper\Exception
     */
    public function actionIndex()
    {
        $this->render('index', []);
    }

    public function actionError()
    {
        var_dump(\PF::app()->getErrorHandler()->getError());
    }

    public function actionBlock()
    {
        $this->render('block', []);
    }
}