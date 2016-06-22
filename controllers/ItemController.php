<?php
/**
 * ItemController class file.
 * @copyright (c) 2015, Bariev Pavel
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace bariew\scheduleModule\controllers;

use bariew\abstractModule\controllers\AbstractModelController;
use Yii;
use yii\filters\VerbFilter;

/**
 * For managing schedule items.
 *
 * @author Pavel Bariev <bariew@yandex.ru>
 */
class ItemController extends AbstractModelController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
}
