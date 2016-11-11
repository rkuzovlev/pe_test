<?php

namespace AppBundle\Twig;

use JMS\Serializer\SerializationContext;

class PrefetchExtension extends \Twig_Extension
{
    protected $serializer;

    public function __construct ($serializer){
        $this->serializer = $serializer;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('prefetch', array($this, 'prefetchFilter')),
        );
    }

    public function prefetchFilter($data, $groups = array('list'))
    {
        $json = $this->serializer->serialize($data, 'json', SerializationContext::create()->setGroups($groups));
        return $json;
    }

    public function getName()
    {
        return 'prefetch_extension';
    }
}