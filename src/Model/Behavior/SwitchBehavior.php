<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\Database\Expression\QueryExpression;
use Cake\Datasource\EntityInterface;
use Cake\I18n\FrozenTime;
use Cake\ORM\Behavior;
use Cake\ORM\Query;

/**
 * Switch behavior
 */
class SwitchBehavior extends Behavior
{
    use ConfigVerificationTrait;

    protected $_defaultConfig = [
        'field' => 'disabled',
    ];

    /**
     * @param array $config Array
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->verifyConfig();
    }

    /**
     * @param \Cake\Datasource\EntityInterface $entity EntityInterface
     * @return bool
     */
    public function enable(EntityInterface $entity): bool
    {
        /** @var string $data */
        $data = $this->getConfig('field');
        $entity->setAccess($data, true);
        $entity->set($data, null);
        if ($this->table()->save($entity)) {
            return true;
        }

        return false;
    }

    /**
     * @param \Cake\Datasource\EntityInterface $entity EntityInterface
     * @return bool
     */
    public function disable(EntityInterface $entity): bool
    {
        /** @var string $data */
        $data = $this->getConfig('field');
        $entity->setAccess($data, true);
        $entity->set($data, new FrozenTime());
        if ($this->table()->save($entity)) {
            return true;
        }

        return false;
    }

    /**
     * @param \Cake\ORM\Query $query DataBaseQuery
     * @return \Cake\ORM\Query
     */
    public function findEnabled(Query $query): Query
    {
        return $query->where(function (QueryExpression $expression) {
            /** @var string $data */
            $data = $this->getConfig('field');

            return $expression->isNull($this->table()->aliasField($data));
        });
    }

    /**
     * @param \Cake\ORM\Query $query DataBaseQuery
     * @return \Cake\ORM\Query
     */
    public function findDisabled(Query $query): Query
    {
        return $query->where(function (QueryExpression $expression) {
            /** @var string $data */
            $data = $this->getConfig('field');

            return $expression->isNotNull($this->table()->aliasField($data));
        });
    }
}
