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

    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
