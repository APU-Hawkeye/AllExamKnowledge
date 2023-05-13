<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Class PaginationControlHelper
 *
 * @package App\View\Helper
 * @property Helper\HtmlHelper $Html
 * @property Helper\PaginatorHelper $Paginator
 */

class PaginationControlHelper extends Helper
{
    protected $helpers = [
        'Html',
        'Paginator'
    ];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @param array $limits
     * @param string|null $btnLabel
     * @param string|null $id
     * @return string
     */
    public function get(array $limits, ?string $btnLabel = null, ?string $id = null)
    {
        $htm = '<div class="dropdown d-none d-md-table-cell">';
        $htm .= '<button class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" type="button" id="'.($id ?? null).'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        $htm .= $btnLabel ?: __("Show");
        $htm .= '</button>';
        $htm .= '<div class="dropdown-menu" aria-labelledby="'.($id ?? null).'">';
        foreach ( $limits as $limit => $limitLabel ) {
            $htm .= $this->Html->link($limitLabel, $this->Paginator->generateUrl([
                'limit' => $limit
            ]), ['class' => 'dropdown-item']);
        }
        $htm .= '</div>';
        $htm .= '</div>';
        return $htm;
    }
}
