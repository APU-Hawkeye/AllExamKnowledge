<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\Core\Exception\Exception;

/**
 * Trait ConfigVerificationTrait
 *
 * @package App\Model\Behavior
 */
trait ConfigVerificationTrait
{
    /**
     * @throws \Cake\Core\Exception\Exception
     * @return void
     */
    public function verifyConfig() : void
    {
        parent::verifyConfig();
        /** @var string $data */
        $data = $this->getConfig('field');
        if ($this->table()->getSchema()->hasColumn($data) === false) {
            throw new Exception(
                sprintf(
                    '%s does not exist in %s table.',
                    $data,
                    $this->table()->getTable()
                )
            );
        }
    }
}
