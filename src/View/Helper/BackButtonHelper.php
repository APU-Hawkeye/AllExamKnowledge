<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * BackButton helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class BackButtonHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'field' => 'referer',
    ];

    protected $helpers = [
        'Html',
    ];

    /**
     * @param array $options PhpDocTypeImpl
     * @return string
     */
    public function render(array $options = []): string
    {
        $url = [
            'controller' => 'Users',
            'action' => 'dashboard',
        ];
        /** @var string $data */
        $data = $this->getConfig('field');
        /** @var string|null $referer */
        $referer = $this->getView()->getRequest()->getQuery($data);
        if ($referer) {
            $url = urldecode($referer);
        }

        return $this->Html->link('<i data-feather="arrow-left-circle"></i>', $url, [
            'escape' => false,
            'class' => $options['class'] ?? null,
        ]);
    }
}
