<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table('users', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('uin', 'integer')
            ->addColumn('first_name', \Phinx\Util\Literal::from('citext'))
            ->addColumn('last_name', \Phinx\Util\Literal::from('citext'))
            ->addColumn('username', 'string', [
                'length' => 32
            ])
            ->addColumn('email', 'string', [
                'length' => 128
            ])
            ->addColumn('password', 'string', [
                'length' => 128
            ])
            ->addColumn('password_expiry', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('password_updated', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('disabled', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('deleted', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn("created", "datetime")
            ->addColumn("modified", "datetime")
            ->addIndex(["username"], [
                "unique" => true,
                "name" => "uniq_username"
            ])
            ->create();
    }
}
