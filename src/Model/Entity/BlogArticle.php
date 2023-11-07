<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogArticle Entity
 *
 * @property string $id
 * @property string $blog_author_id
 * @property string $blog_category_id
 * @property string $title
 * @property string|null $body
 * @property string|null $image
 * @property int|null $read_time
 * @property string|null $meta_description
 * @property string $slug
 * @property \Cake\I18n\FrozenTime|null $disabled
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BlogAuthor $blog_author
 * @property \App\Model\Entity\BlogCategory $blog_category
 */
class BlogArticle extends Entity
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
        'blog_author_id' => true,
        'blog_category_id' => true,
        'title' => true,
        'body' => true,
        'image' => true,
        'read_time' => true,
        'meta_description' => true,
        'slug' => true,
        'disabled' => true,
        'created' => true,
        'modified' => true,
        'blog_author' => true,
        'blog_category' => true,
    ];
}
