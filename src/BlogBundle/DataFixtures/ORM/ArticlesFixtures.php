<?php

namespace BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Articles;

class ArticlesFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog1 = new Articles();
        $blog1->setTitle('La santé de Liszt');
        $blog1->setBlog('De santé fragile, Franz Liszt manque à plusieurs reprises de succomber à des fièvres. À six ans, il chante de mémoire le thème du Concerto en ut dièse mineur de Ries que son père a joué quelques heures plus tôt. Adam Liszt décide de lui enseigner le piano. En moins de deux ans, Liszt aborde  Johann Sebastian Bach, Wolfgang Amadeus Mozart et Ludwig van Beethoven. Conscient de ces progrès, Adam Liszt souhaite faire de son fils un enfant prodige, sur le modèle du jeune Mozart. Grâce au soutien financier de quelques nobles hongrois, la famille Liszt à Vienne en 1822. Franz Liszt suit les cours de piano de Carl Czerny et les cours de composition de Antonio Salieri. Ainsi préparé, il donne son premier concert public à la Landständischer Saal le 1er décembre 1822. Organisé quelques mois plus tard, le concert de la Redoutensaal a inspiré une légende biographique populaire : Beethoven serait venu embrasser sur scène. En réalité, Beethoven a pas assisté à ce concert. Il semblerait néanmoins quil ait écouté Liszt chez Czerny et lait chaleureusement félicité pour la qualité de son jeu.');
        $blog1->setImage('liszt.jpg');
        $blog1->setAuthor('bob');
        $blog1->setTags('liszt');
        $blog1->setCreated(new \DateTime());
        $blog1->setUpdated($blog1->getCreated());
        $manager->persist($blog1);

        $blog2 = new Articles();
        $blog2->setTitle('Un pianiste virtuose');
        $blog2->setBlog('Toutes les sources font de Liszt un des plus grands pianistes de son temps. Malheureusement, il existe aucun enregistrement pour pouvoir en juger29.
Néanmoins, plusieurs indications nous permettent de nous faire une idée de ses capacités de virtuose. Sur le plan purement technique, Liszt possède une main une taille peu commune qui lui permet datteindre la douzième. Son professeur, Czerny, était, et demeure, le maître incontesté pour ce qui est de la vélocité et de agilité pianistique. Sur le plan intellectuel la supériorité de Liszt est la plus visible.');
        $blog2->setImage('piano.jpg');
        $blog2->setAuthor('superbob');
        $blog2->setTags('lorem, ipsum');
        $blog2->setCreated(new \DateTime("2011-07-23 06:12:33"));
        $blog2->setUpdated($blog2->getCreated());
        $manager->persist($blog2);

        // $blog3 = new Articles();
        // $blog3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
        // $blog3->setBlog('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        // $blog3->setImage('misdirection.jpg');
        // $blog3->setAuthor('Gabriel');
        // $blog3->setTags('misdirection, magic, movie, hacking, symblog');
        // $blog3->setCreated(new \DateTime("2011-07-16 16:14:06"));
        // $blog3->setUpdated($blog3->getCreated());
        // $manager->persist($blog3);
        //
        // $blog4 = new Articles();
        // $blog4->setTitle('The grid - A digital frontier');
        // $blog4->setBlog('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        // $blog4->setImage('the_grid.jpg');
        // $blog4->setAuthor('Kevin Flynn');
        // $blog4->setTags('grid, daftpunk, movie, symblog');
        // $blog4->setCreated(new \DateTime("2011-06-02 18:54:12"));
        // $blog4->setUpdated($blog4->getCreated());
        // $manager->persist($blog4);
        //
        // $blog5 = new Articles();
        // $blog5->setTitle('You\'re either a one or a zero. Alive or dead');
        // $blog5->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        // $blog5->setImage('one_or_zero.jpg');
        // $blog5->setAuthor('Gary Winston');
        // $blog5->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
        // $blog5->setCreated(new \DateTime("2011-04-25 15:34:18"));
        // $blog5->setUpdated($blog5->getCreated());
        // $manager->persist($blog5);



        $manager->flush();

        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        // $this->addReference('blog-3', $blog3);
        // $this->addReference('blog-4', $blog4);
        // $this->addReference('blog-5', $blog5);


    }


    public function getOrder()
    {
        return 1;
    }

}
