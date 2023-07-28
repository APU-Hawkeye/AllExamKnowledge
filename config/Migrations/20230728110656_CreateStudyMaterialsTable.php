<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateStudyMaterialsTable extends AbstractMigration
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
        $table = $this->table('study_materials', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('sub_category_id', 'uuid')
            ->addColumn('title', 'text', [
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('file', 'text', [
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
