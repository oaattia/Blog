<?php

namespace Oaattia\BlogBundle\Resolver;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginFormResolver implements ArgumentValueResolverInterface
{
    
    /**
     * @var ContainerInterface
     */
    protected $container;
    
    /**
     * LoginFormResolver constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * Whether this resolver can resolve the value for the given ArgumentMetadata.
     *
     * @param Request $request
     * @param ArgumentMetadata $argument
     *
     * @return bool
     */
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        if( AuthenticationUtils::class !== $argument->getType() ) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Returns the possible value(s).
     *
     * @param Request $request
     * @param ArgumentMetadata $argument
     *
     * @return \Generator
     */
    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield $this->container->get('security.authentication_utils');
    }
}