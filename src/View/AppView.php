<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use App\View\Helper\BackButtonHelper;
use App\View\Helper\PaginationControlHelper;
use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 * @property PaginationControlHelper $PaginationControl
 * @property BackButtonHelper $BackButton
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
//        $this->Paginator->setTemplates([
//            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}"><i class="mdi mdi-chevron-right"></i></a></li>',
//            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" disabled href="javascript:;"><i class="mdi mdi-chevron-right"></i></a></li>',
//            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}"><i class="mdi mdi-chevron-left"></i></a></li>',
//            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" disabled href="javascript:;"><i class="mdi mdi-chevron-left"></i></a></li>',
//            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
//            'current' => '<li class="page-item disabled"><a class="page-link" disabled href="javascript:;">{{text}}</a></li>',
//        ]);
//        $this->loadHelper('PaginationControl');
        $this->loadHelper("BackButton");
        $this->loadHelper('Paginator', ['templates' => 'paginator-templates']);
    }
}
