<?php
namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $articles = [
            [
                'titre' => 'Séisme en F1 : Lewis Hamilton annonce son arrivée chez Ferrari',
                'contenu' => "En février 2024, la Formule 1 a vécu l’un des plus grands bouleversements de son histoire moderne. Lewis Hamilton a annoncé qu’il quittera Mercedes-AMG Petronas à la fin de la saison pour rejoindre Scuderia Ferrari en 2025.<br><br>L’annonce a pris tout le paddock de court. Après plus de dix ans passés chez Mercedes, six titres mondiaux remportés avec l’écurie allemande et une domination sans partage entre 2014 et 2020, Hamilton semblait lié à l’équipe à long terme. Pourtant, à 39 ans, le Britannique a choisi de relever l’un des défis les plus mythiques du sport automobile : ramener Ferrari au sommet.<br><br>Sur le plan sportif, Ferrari voit en Hamilton un leader capable d’encadrer le développement technique à l’approche des nouvelles règles de 2026. Sur le plan médiatique, l’effet est colossal : explosion des ventes de produits dérivés, engagement record sur les réseaux sociaux et regain d’attention internationale.<br><br>Ce transfert redessine également le marché des pilotes : Mercedes doit reconstruire autour d’un nouveau leader, et plusieurs équipes ont dû réajuster leurs plans pour 2025. Plus qu’un simple mouvement, c’est un tournant stratégique pour l’équilibre du championnat.",
                'image' => 'hamilton-article.jpg',
            ],
            [
                'titre' => 'Affaire Christian Horner : une tempête en coulisses chez Red Bull',
                'contenu' => "La domination sportive ne suffit pas toujours à protéger d’une crise interne. En début de saison 2024, Christian Horner, directeur de Red Bull Racing, a fait l’objet d’une enquête interne pour comportement inapproprié.<br><br>Si l’enquête a conclu à l’absence de faute justifiant une sanction, l’affaire a profondément secoué le paddock. Les rivalités internes au sein du groupe Red Bull ont été exposées publiquement, alimentant spéculations et tensions.<br><br>Sportivement, l’équipe a tenté de maintenir son niveau de performance, portée par Max Verstappen. Mais médiatiquement, l’impact a été important. La F1 moderne, devenue produit mondial, ne se joue plus uniquement sur la piste : la gouvernance et l’image sont désormais centrales.<br><br>Cette affaire rappelle que derrière les performances techniques se cachent des structures complexes, où enjeux sportifs et politiques sont intimement liés.",
                'image' => 'horner-article.webp',
            ],
            [
                'titre' => 'Miami 2024 : la délivrance de Lando Norris',
                'contenu' => "Il aura fallu attendre plusieurs saisons, mais la récompense est finalement arrivée. En mai 2024, Lando Norris remporte son premier Grand Prix en carrière à Miami.<br><br>Ce succès marque un tournant pour McLaren, en pleine renaissance technique. Après des années difficiles, l’équipe britannique a réussi un impressionnant redressement grâce à des évolutions aérodynamiques majeures.<br><br>Pour Norris, cette victoire met fin à une longue série de podiums frustrants. Le Britannique change de statut : il passe du rôle de jeune talent prometteur à celui de pilote capable de gagner et de se battre régulièrement en tête.<br><br>Au-delà de l’émotion personnelle, cette victoire symbolise le retour d’une concurrence plus intense en Formule 1.",
                'image' => 'norris-article.avif',
            ],
            [
                'titre' => 'Red Bull toujours leader, mais plus intouchable',
                'contenu' => "Après une saison 2023 historiquement dominante, Max Verstappen et Red Bull semblaient promis à une nouvelle année sans partage. Pourtant, 2024 marque un rééquilibrage progressif.<br><br>Si Verstappen reste le pilote référence du plateau, Ferrari et McLaren réduisent sensiblement l’écart. Plusieurs courses offrent un suspense retrouvé, loin des démonstrations à sens unique de 2023.<br><br>Les progrès des équipes rivales montrent que la réglementation actuelle commence à produire ses effets : avec le plafonnement budgétaire et la stabilité technique, les écarts se resserrent.<br><br>La saison 2024 apparaît ainsi comme une transition vers un championnat plus disputé.",
                'image' => 'redbull-article.jpg',
            ],
            [
                'titre' => 'Une lutte à trois pour le championnat constructeurs',
                'contenu' => "La grande nouveauté sportive de 2024 réside dans la bataille pour le titre constructeurs entre :<br><br>Red Bull Racing<br>Scuderia Ferrari<br>McLaren<br><br>Contrairement à la saison précédente, le championnat ne semble plus joué dès les premières courses. La régularité, la fiabilité moteur et la gestion des évolutions techniques deviennent déterminantes.<br><br>Chaque week-end compte, chaque stratégie peut faire la différence. Cette intensité renforce l’attrait du championnat et confirme le retour d’une compétition plus équilibrée.",
                'image' => 'ferrari-article.jpg',
            ],
            [
                'titre' => 'La Formule 1, phénomène mondial accéléré',
                'contenu' => "La saison 2024 confirme la montée en puissance économique et médiatique de la discipline. La série Netflix Formula 1: Drive to Survive continue d’attirer de nouveaux publics, notamment en Amérique du Nord.<br><br>Les Grands Prix à Miami, Austin et Las Vegas illustrent la stratégie d’expansion vers le marché américain. Les audiences numériques explosent, et la F1 s’impose comme un produit premium mêlant sport, divertissement et storytelling.<br><br>La discipline ne se résume plus à la performance technique : elle est devenue une marque mondiale.<br><br>La saison 2024 en est la parfaite démonstration.",
                'image' => 'netflix-article.jpg',
            ],
        ];

        foreach ($articles as $data) {
            $article = new Article();
            $article->setTitre($data['titre']);
            $article->setContenu($data['contenu']);
            $article->setImage($data['image']);
            $article->setIsPublished(true);
            $manager->persist($article);
        }
        $manager->flush();
    }
}
