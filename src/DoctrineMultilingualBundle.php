<?php
namespace Keym\MultilingualBundle;

use Doctrine\DBAL\Types\Type;
use Keym\MultilingualString\Type\MultilingualStringType;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DoctrineMultilingualBundle extends Bundle
{
    public function __construct()
    {
        $types = Type::getTypesMap();
        if (!isset($types['multilingual_string'])) {
            Type::addType('multilingual_string', MultilingualStringType::class);
        }
    }


    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DependencyInjection\DoctrineMultilingualExtension();
    }

}
