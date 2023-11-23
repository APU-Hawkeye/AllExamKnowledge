<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateNewsEventsTable extends AbstractMigration
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
        $table = $this->table('news_events', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('title', 'text', [
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('tag', 'string', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('link', 'text', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('file', 'text')
            ->addColumn('disabled', 'datetime', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}
