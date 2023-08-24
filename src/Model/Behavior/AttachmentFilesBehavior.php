<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use App\Database\Type\FileType;
use App\Service\Storage\Storage;
use Cake\Core\Configure;
use Cake\Core\Exception\Exception;
use Cake\Database\Type;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Laminas\Diactoros\UploadedFile;
use League\Flysystem\Filesystem;

/**
 * AttachmentFiles behavior
 */
class AttachmentFilesBehavior extends Behavior
{
    protected $_defaultConfig = [
        'fields' => []
    ];

    private Filesystem $_storage;

    /**
     * @throws \ReflectionException
     */
    public function __construct(Table $table, array $config = [])
    {
        $this->_storage = Storage::getStorage(Configure::read('FileSystem.dsn'));
        parent::__construct($table, $config);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function verifyConfig(): void
    {
        parent::verifyConfig();
        foreach ($this->getConfig('fields') as $field) {
            if ($this->table()->getSchema()->hasColumn($field) === false) {
                throw new Exception(sprintf("%s does not exist in %s table.", $field, $this->table()->getTable()));
            }
        }
    }

    /**
     * @param EventInterface $event
     * @param EntityInterface $entity
     * @throws \League\Flysystem\FilesystemException
     */
    public function beforeSave(EventInterface $event, EntityInterface $entity)
    {
        $baseFolder = $this->table()->getTable();
        foreach ( $this->getConfig('fields') as $field ) {
            if ($entity->has($field . '_binary') && $entity->get($field . '_binary')) {
                if (preg_match(/** @lang text */ '/^data:image\/(?<extension>(?:png|gif|jpg|jpeg));base64,(?<image>.+)$/', $entity->get($field . '_binary'), $matchings)) {
                    $imageData = base64_decode($matchings['image']);
                    $extension = $matchings['extension'];
                    $savePath = $baseFolder . DS . $field . DS . Text::uuid() . "." . $extension;
                    $this->_storage->write($savePath, $imageData);
                    $entity->set($field, $savePath);
                }
            } else {
                $attachment = $entity->get($field);
                if ($attachment instanceof UploadedFile) {
                    if ($attachment->getError() === UPLOAD_ERR_OK) {
                        $savePath = $baseFolder . DS . $field . DS . $attachment->getClientFilename();
                        $this->_storage->write($savePath, $attachment->getStream()->getContents());
                        $entity->set($field, $savePath);
                    } else {
                        $entity->set($field, null);
                    }
                }
            }
            $this->table()->getSchema()->setColumnType($field, 'string');
        }
    }

    /**
     * @param EventInterface $event
     * @param \ArrayObject $data
     * @return void
     */
    public function beforeMarshal(EventInterface $event, \ArrayObject $data)
    {
        foreach ( $this->getConfig('fields') as $field ) {
            if (isset($data[$field])) {
                Type::map('uploaded.file', FileType::class);
                $this->table()->getSchema()->setColumnType($field, 'uploaded.file');
            }
        }
    }
}
