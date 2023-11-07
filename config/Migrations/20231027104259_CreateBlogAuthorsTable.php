<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBlogAuthorsTable extends AbstractMigration
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
        $table = $this->table('blog_authors', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('first_name', \Phinx\Util\Literal::from('citext'))
            ->addColumn('last_name', \Phinx\Util\Literal::from('citext'))
            ->addColumn('description', \Phinx\Util\Literal::from('citext'))
            ->addColumn('image', 'string', [
                'length' => 1024,
                'null' => true,
                'default' => null
            ])
            ->addColumn('disabled', 'datetime', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}
