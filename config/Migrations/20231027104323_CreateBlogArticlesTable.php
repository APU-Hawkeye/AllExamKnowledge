<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBlogArticlesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('blog_articles', [
            'id'=> false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('blog_author_id', 'uuid')
            ->addColumn('blog_category_id', 'uuid')
            ->addColumn('title', \Phinx\Util\Literal::from('citext'), [
                'length' => 128
            ])
            ->addColumn('body', \Phinx\Util\Literal::from('citext'), [
                'null' => true,
                'default' => null
            ])
            ->addColumn('image', 'string', [
                'null' => true,
                'default' => null,
                'length' => 1024*1024
            ])
            ->addColumn('read_time','integer', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('meta_description', 'string', [
                'null' => true,
                'default' => null,
                'length' => 200
            ])
            ->addColumn('slug', 'text', [
                'null' => false
            ])
            ->addColumn('disabled', 'datetime', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex('slug', [
                'unique' => true,
                'name' => 'uniq_article_slug'
            ])
            ->create();
    }
}
