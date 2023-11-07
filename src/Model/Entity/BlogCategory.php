<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogCategory Entity
 *
 * @property string $id
 * @property string $code
 * @property string $title
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $disabled
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class BlogCategory extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'code' => true,
        'title' => true,
        'description' => true,
        'disabled' => true,
        'created' => true,
        'modified' => true,
    ];
}
