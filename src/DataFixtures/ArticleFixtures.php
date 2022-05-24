<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $article = new Article();
            $article->setTitre("Lorem Ipsum");
            $article->setDescription("Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit");
            $article->setContenu("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis quam nec urna lacinia imperdiet vitae nec mauris. Fusce placerat, enim non bibendum feugiat, purus dui fringilla urna, sit amet lobortis eros ante ac mi. Suspendisse eget porta sapien. Mauris eu fringilla quam, vel feugiat ipsum. Praesent ultrices ex mi, at pretium ante dignissim at. Pellentesque vulputate pretium mauris, et lacinia lacus scelerisque a. Nunc nec mi et justo aliquet posuere ut non elit. Integer nec enim velit. Sed quis justo efficitur, dapibus ex ut, placerat nisl. Aenean eu nisl faucibus, congue augue a, interdum odio. Morbi elementum, purus nec placerat gravida, nisl quam tincidunt quam, eget eleifend augue augue et massa. Nunc neque erat, venenatis vel lacus et, sollicitudin faucibus ante.\n\nAliquam tristique urna dui, eget accumsan justo congue ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras malesuada odio facilisis dolor malesuada vehicula. Nunc varius venenatis enim ac accumsan. Sed est lorem, convallis sed convallis vel, mollis vitae tellus. Etiam facilisis condimentum elementum. Duis sit amet est volutpat, iaculis massa nec, sodales enim. Nullam sollicitudin suscipit condimentum. Phasellus volutpat aliquet turpis ac condimentum. Etiam vitae leo accumsan, eleifend massa sed, commodo libero. Aenean sem dui, ornare nec lobortis vel, dapibus et magna. Suspendisse ut quam dictum, ultrices quam varius, convallis tortor. Ut rhoncus semper nisi.\n\nDonec vehicula arcu enim. Etiam diam erat, hendrerit vel imperdiet at, pulvinar nec erat. Fusce egestas blandit lacus ac efficitur. Suspendisse dapibus fringilla tincidunt. Fusce bibendum, nulla ut suscipit finibus, felis arcu dictum nisi, fermentum suscipit tellus nisl ac enim. Proin eleifend posuere odio ac luctus. Suspendisse ultrices lectus magna, id rhoncus elit facilisis vestibulum. Aliquam quam ipsum, mollis vitae risus eu, pulvinar dapibus purus. Morbi lobortis tellus vitae molestie venenatis.");
            $manager->persist($article);
        }
        $manager->flush();
    }
}
