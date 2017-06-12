<?php

namespace Oaattia\BlogBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Oaattia\BlogBundle\Entity\Post;
use Oaattia\BlogBundle\Entity\Tag;

class LoadUserData implements FixtureInterface
{
    
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $tag = new Tag();
        
        $post->setTitle("first title");
        $post->setBody("Post body");
        
        $tag->setTitle("First Tag");
        $tag->setTitle("Second Tag");
        $post->setTags($tag);
        
        $manager->persist($post);
        $manager->flush();
    }
}