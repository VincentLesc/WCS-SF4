<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 10/10/18
 * Time: 16:47
 */

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $faker  =  Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle(mb_strtolower($faker->sentence()));
            $article->setContent($faker->text());
            $article->setCategory($this->getReference('category_' . ($i%5)));
            $manager->persist($article);
            $manager->flush();
        }

        $article = new Article();
        $article->setTitle(mb_strtolower("Javascript VS PHP"));
        $article->setContent("Javascript VS PHP, une rivalité ? Comme dit Douglas Crockford : JavaScript is the world s most misunderstood programming language.");
        $article->setCategory($this->getReference('category_' . 2));
        $manager->persist($article);
        $manager->flush();

        $article = new Article();
        $article->setTitle(mb_strtolower("javascript meme"));
        $article->setContent("Welcome to Javascript. Where the objects are made up and the types don t matter !");
        $article->setCategory($this->getReference('category_' . 2));
        $manager->persist($article);
        $manager->flush();

    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
