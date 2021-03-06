<?php

namespace Bolt\Extensions\Entity;

use Doctrine\Entity\Base as EntityBase;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;

class VersionBuild extends EntityBase {

    protected $id;
    protected $package;
    protected $version;
    protected $status;
    protected $lastrun;
    protected $url;
    protected $hash;
    protected $testResult;
    protected $testStatus;
    protected $phpTarget;
    protected $built;
    
    public function getTestResult()
    {
        return json_decode($this->testResult, true);
    }
    

    public static function loadMetadata(ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);
        $builder->createField('id',         'guid')->isPrimaryKey()->generatedValue("UUID")->build();
        $builder->addField('version',       'string',   ['nullable'=>true]);
        $builder->addField('status',        'string',   ['nullable'=>true]);
        $builder->addField('lastrun',       'datetime', ['nullable'=>true]);
        $builder->addField('url',           'string',   ['nullable'=>true]);
        $builder->addField('hash',          'string',   ['nullable'=>true]);
        $builder->addField('testResult',    'text',   ['nullable'=>true]);
        $builder->addField('testStatus',    'string',   ['default'=>'pending', 'nullable'=>true]);
        $builder->addField('phpTarget',     'string',   ['nullable'=>true]);
        $builder->addManyToOne('package',   'Bolt\Extensions\Entity\Package');

    }

}