<?php
namespace minphp\Container;

/**
 * An interface allowing injection of a container
 *
 */
interface ContainerAwareInterface
{
    /**
     * Adds the container
     *
     * @param minphp\Container\ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null);

    /**
     * Fetches a container
     *
     * @return minphp\Container\ContainerInterface
     */
    public function getContainer();
}
