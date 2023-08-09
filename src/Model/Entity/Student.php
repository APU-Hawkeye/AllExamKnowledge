<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property string $id
 * @property int $sin
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Cake\I18n\FrozenTime|null $email_verified
 * @property string|null $phone
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $password_expiry
 * @property \Cake\I18n\FrozenTime|null $password_updated
 * @property string|null $gender
 * @property \Cake\I18n\FrozenDate|null $date_of_birth
 * @property \Cake\I18n\FrozenTime|null $profile_completed
 * @property \Cake\I18n\FrozenTime|null $disabled
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Student extends Entity
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
        'sin' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'email_verified' => true,
        'phone' => true,
        'password' => true,
        'password_expiry' => true,
        'password_updated' => true,
        'gender' => true,
        'date_of_birth' => true,
        'profile_completed' => true,
        'disabled' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected $_virtual = [
        'full_name',
    ];

    /**
     * @param string $password Password
     * @return string
     */
    protected function _setPassword(string $password)
    {
        $hashed = new DefaultPasswordHasher();

        return $hashed->hash($password);
    }

    /**
     * @return string
     */
    protected function _getFullName()
    {
        return implode(' ', array_filter([
            $this->first_name,
            $this->last_name,
        ]));
    }
}
