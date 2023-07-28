<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSubCategoriesTable extends AbstractMigration
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
        $table = $this->table('sub_categories', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('category_id', 'uuid')
            ->addColumn('code', 'string', [
                'null' => false,
            ])
            ->addColumn('title', 'text', [
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('disabled', 'datetime', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex([
                'category_id',
                'code',
            ], [
                'unique' => true,
                'name' => 'uniq_sub_category_code',
            ])
            ->create();
    }
}
