<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $now = (new \Cake\I18n\FrozenTime())->format("Y-m-d H:i:s");
        $data = [
            [
                'id' => \Cake\Utility\Text::uuid(),
                'uin' => 100,
                'first_name' => 'Swarup',
                'last_name' => 'Saha',
                'username' => 'admin',
                'email' => 'swarup1odev@gmail.com',
                'password' => (new DefaultPasswordHasher())->hash('Secret'),
                'password_expiry' => null,
                'password_updated' => null,
                'disabled' => null,
                'created' => $now,
                'modified' => $now
            ]
        ];
        $table = $this->table('users');
        $table->truncate();
        $table->insert($data)->save();
    }
}
