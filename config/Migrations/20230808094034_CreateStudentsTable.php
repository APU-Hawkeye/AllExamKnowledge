<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateStudentsTable extends AbstractMigration
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
        $table = $this->table('students', [
            'id' => false,
            'primary_key' => 'id'
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('sin', 'integer')
            ->addColumn('first_name', \Phinx\Util\Literal::from('citext'))
            ->addColumn('last_name', \Phinx\Util\Literal::from('citext'))
            ->addColumn('email', 'string', [
                'length' => 128
            ])
            ->addColumn('email_verified', 'datetime', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('phone', 'string', [
                'null' => true,
                'default' => null,
                'length' => 10
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
            ->addColumn('gender', 'text', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('date_of_birth', 'date', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('profile_completed', 'datetime', [
                'null' => true,
                'default' => null
            ])
            ->addColumn('disabled', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addColumn('deleted', 'datetime', [
                'null' => true,
                'default' => null,
            ])
            ->addIndex([
                'email',
                'sin'
            ], [
                'unique' => true,
                'name' => 'uniq_student_email',
            ])
            ->addColumn("created", "datetime")
            ->addColumn("modified", "datetime")
            ->create();
    }
}
