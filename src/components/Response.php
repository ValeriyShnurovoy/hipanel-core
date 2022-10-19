<?php
/**
 * HiPanel core package
 *
 * @link      https://hipanel.com/
 * @package   hipanel-core
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2019, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\components;

use Yii;

class Response extends \yii\web\Response
{
    public function refresh($anchor = '')
    {
        $request = Yii::$app->request;
        if ($request->getIsAjax()) {
            return $this->redirect($request->getReferrer() . $anchor);
        }

        return parent::refresh($anchor);
    }
}
