<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Article::create([
            'nom' => 'Sage barista express impress inox noir',
            'description' => 'La machine expresso SAGE Barista Express Impress est la continuation de la célèbre Barista Express, le modèle le plus vendu par la marque dans le monde ces cinq dernières années.',
            'description_detaillee' => 'Tout comme sa grande sœur, la Barista Express Impress SES876BST4EEU1 inox noir est conçue avec une belle carrosserie en acier inoxydable noir. Son moulin intégré contient des meules coniques en acier inoxydable de qualité, avec un système de 25 réglages différents pour obtenir la mouture idéale selon le café en grain choisi. 
                                        SAGE a fourni des filtres simples, mais aussi des filtres pressurisés, qui peuvent être utilisés avec du café pré-moulu, une bonne idée les invités qui préfèrent un café décaféiné.',
            'image' => 'sage_barista_express_impress_bst_inox_noir.jpg',
            'prix' => 829.90,
            'stock' => 12,
            'note' => 3.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Delonghi Dedica EC695.M inox brossé',
            'description' => 'La DeLonghi Dedica EC695.M est une dédicace à l\'art de vivre à l\'italienne ! Elle s\'adapte à tous les espaces grâce à sa silhouette et son design élégant.',
            'description_detaillee' => 'Cette petite machine à café polyvalente vous permet d\'utiliser du café prémoulu (grâce aux filtres pressurisés) ou des dosettes ESE (pratique pour les invités qui préfèrent un café décaféiné par exemple). 
                                        Pour les amoureux de café fraîchement moulu, un moulin à café d\'entrée de gamme sera suffisant pour obtenir une mouture expresso adaptée aux filtres de cette machine à café Dedica. 
            La Dedica EC695.M dispose d\'un thermoblock qui chauffe l\'eau rapidement et maintient la machine à la bonne température. Le temps de chauffe est d\'environ 35 secondes.',
            'image' => 'dedica_inox_5.jpg',
            'prix' => 199.00,
            'stock' => 87,
            'note' => 5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Ascaso dream pid',
            'description' => 'La machine expresso Dream est le modèle emblématique de la marque ASCASO,  des machines à café conçues pour usage domestique en 2000.',
            'description_detaillee' => 'La version PID offre des performances professionnelles : porte-filtre et filtres en acier inoxydable de 58 mm de diamètre,  OPV réglable de l\'extérieur et un affichage PID externe pour le réglage de la température, pré-infusion réglable, option stand-by et bien plus encore. Toutes les machines expresso Ascaso Dream sont fabriquées main à Barcelone, avec une belle carrosserie tout en aluminium. Après le polissage, la machine est traitée avec un vernis de haute qualité (le même revêtement utilisé en Formule 1 et sur les bateaux), avec une gamme de couleurs en finition mat.',
            'image' => 'ascaso_dream_pid.jpg',
            'prix' => 1098.00,
            'stock' => 23,
            'note' => 4.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'delonghi eletta explore',
            'description' => 'La cafetière à grain DeLonghi Eletta Explore est impressionnante sur tous les points de vue. Son design est moderne et travaillé, et le coloris Titanium avec les buses inox est particulièrement réussie.',
            'description_detaillee' => 'L\'écran tactile de 3,5" est complété par des touches illustrées et colorées. Cela rend la navigation vraiment simple et agréable. Vous pourrez accéder à tous les paramètres très simplement pour réaliser un café sur-mesure : intensité sur 5 niveaux, 4 longueurs en tasse, 3 températures.  Vous pourrez enregistrer vos réglages sur les 4 profils utilisateurs pour retrouver vos recettes préférées.',
            'image' => 'delonghi_eletta_explore.jpg',
            'prix' => 1099.90,
            'stock' => 3,
            'note' => 5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Delonghi Magnifica S Smart titanium',
            'description' => 'Personnaliser son café n\'a jamais été aussi facile : Café serré ou café long, extra-léger à extra-fort et de température basse, moyenne ou élevée. De plus, le broyeur est réglable sur 13 niveaux.',
            'description_detaillee' => 'La Delonghi Magnifica S Smart Smart FEB 2541.TB dispose d\'une buse vapeur améliorée qui, au-delà de délivrer de la vapeur, vous promet une mousse de lait digne des meilleurs baristi italiens, et ce, sans effort :  les boissons à base de mousse de lait n\'auront plus de secrets pour vous !
                                        Le système Cappuccino vous permet de réaliser une mousse crémeuse pour de parfaits Cappuccinos, latte macchiatos, expressos macchiatos et plus si affinités.',
            'image' => 'delonghi_Magnifica_S_Smart_titanium.png',
            'prix' => 399.00,
            'stock' => 55,
            'note' => 2.5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Saeco Gran Aroma Deluxe SM6680 noire',
            'description' => 'Cette machine à café grain Saeco Gran Aroma Deluxe dispose d\'un grand écran tactile de 5,4" pour une utilisation simplifiée, aussi facile que sur un téléphone !',
            'description_detaillee' => 'Cet expresso broyeur Gran Aroma Deluxe de Saeco saura s\'adapter à toutes les envies et tous les palais. Que vous soyez amateur de café corsé ou de boissons lactées, elle saura convaincre un large panel.
                                        Choissisez parmi 18 recettes différentes, de quoi changer de boissons aussi souvent que d\'humeur. Le Latte Perfetto avec une carafe à lait externe permet de réaliser une délicieuse mousse de lait onctueuse avec de fines bulles.',
            'image' => 'saeco_gran_aroma_deluxe.jpeg',
            'prix' => 999.90,
            'stock' => 27,
            'note' => 4.5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Bialetti press preziosa',
            'description' => 'Bialetti est synonyme de qualité dans le monde du café. Cette marque italienne offre une cafetière avec un rapport qualité/prix excellent.',
            'description_detaillee' => 'La cafetière à piston est un des modèles de cafetières les plus faciles à utiliser.
                                        Versez votre café moulu dans le pichet et couvrez avec de l\'eau chaude non bouillante (comptez 1 c. à c. et 90 ml d\'eau par tasse).',
            'image' => 'coffee_press_preziosa.jpeg',
            'prix' => 30.50,
            'stock' => 122,
            'note' => 2,
            'gamme_id' => 3,
        ]);

        Article::create([
            'nom' => 'Cafetière à piston Cali',
            'description' => 'La cafetière à piston Cali de Pylano est un modèle de cafetière pratique et facile d\'utilisation.',
            'description_detaillee' => 'Avec votre cafetière à piston, plus besoin de filtre ou de capsule pour préparer un délicieux café le matin ! De l\'eau chaude et du café moulu, c\'est tout ce qu\'il vous faut. Pour qu\'aucun résidu ne se retrouve dans le fond de votre verre Mila offert avec votre cafetière, Cali possède une double filtration.',
            'image' => 'Cafetière_a_piston_cali.png',
            'prix' => 19.90,
            'stock' => 132,
            'note' => 3.5,
            'gamme_id' => 3,
        ]);

        Article::create([
            'nom' => 'La marzocco Linea Mini',
            'description' => 'La Marzocco a développé le modèle Linea Mini en s\'inspirant du modèle professionnel phare de la marque.',
            'description_detaillee' => 'La Marzocco a développé le modèle Linea Mini en s\'inspirant du modèle professionnel phare de la marque.',
            'image' => 'machine_expresso_la_marzocco_linea_mini.jpg',
            'prix' => 5180.00,
            'stock' => 3,
            'note' => 5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Olman Guatemala 250g',
            'description' => 'Issu de la ferme de Pampojila, ce café est gourmand avec une attaque douce et épicée.',
            'description_detaillee' => 'Ce café El Maya est cultivé dans la région de Huehuetenango, située dans le Nord-Ouest du Guatemala. Cette région est traversée par la chaîne montagneuse de Cuchumanates dont le point culminant se situe à 3828 m d\'altitude. Les caféiers poussant dans cette région bénéficient de conditions climatiques favorables permettant une maturité lente des cerises  ainsi qu\'une complexité aromatique surprenante.',
            'image' => 'cafe_lugat_don olman.jpg',
            'prix' => 6.90,
            'stock' => 261,
            'note' => 4,
            'gamme_id' => 5,
        ]);

        Article::create([
            'nom' => 'Severin fila ka 4851',
            'description' => 'Profitez d\'une boisson savoureuse et gourmande à tout moment de la journée!',
            'description_detaillee' => 'Avec Filka by Severin, la marque allemande a su se distinguer par son broyeur intégré qui vous permet de profiter des arômes d’un grain fraîchement moulu avec une température d’infusion idéale de 96°C afin d’obtenir une boisson savoureuse et gourmande. Grâce à cet appareil, il est maintenant possible de personnaliser son café.',
            'image' => 'video_overlay-5_1920x.jpeg',
            'prix' => 347.27,
            'stock' => 76,
            'note' => 4,
            'gamme_id' => 4,
        ]);

        Article::create([
            'nom' => 'Aircraft AC-755',
            'description' => 'Les 2 boutons levier en acier inoxydable vous offrent une utilisation simplifiée, avec des indications claires.',
            'description_detaillee' => 'Cette machine à café a été conçue avec un système de chauffe performant : une chaudière en laiton de 0,25 L pour la stabilité thermique, une pompe à vibrations parmi les plus silencieuses de la catégorie. Le temps de chauffe est d\'environ 5 minutes, ce qui est assez rapide pour le café du matin.',
            'image' => 'aircraft_ac_755.jpg',
            'prix' => 469.00,
            'stock' => 46,
            'note' => 5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Siemens EQ.700 Intégral Noir',
            'description' => 'Très design, elle dispose d\'une jolie façade en inox et des parois latérales noires.',
            'description_detaillee' => 'Son système lait tout automatique avec réservoir intégré, offre une grande facilité d\'utilisation. Vous pourrez également préparer toutes les boissons en double distribution grâce au LatteDuo. Son extraction IAroma et son Aroma Select vous permettront de personnaliser vos recettes pour s\'adapter à vos goûts.',
            'image' => 'siemens.eq_700_intégral.jpg',
            'prix' => 1129.00,
            'stock' => 23,
            'note' => 5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Café en grain bio Décaféiné',
            'description' => 'Découvrez Décaféiné, le café en grain de la marque Novell.',
            'description_detaillee' => 'Café en grain décaféiné savoureux constitué de plusieurs cafés en grain 100 % arabica, ce café en grain regroupe des notes fruitées (agrumes) et florales, et est proche d\'un expresso traditionnel comme vous les aimez mais sans les contraintes!',
            'image' => 'novellorganic-1.png',
            'prix' => 5.40,
            'stock' => 154,
            'note' => 2,
            'gamme_id' => 5,
        ]);

        Article::create([
            'nom' => 'Cafetière smeg filtre vert d\'eau',
            'description' => 'Cafetière filtre programmable et compacte au design des années 50 équipée d\'une douchette, d\un booster d\'arômes électronique et de la fonction 1-4 tasses.',
            'description_detaillee' => 'La machine à café filtre Smeg vous permet de préparer des délicieux cafés riches en saveur et arôme. La fonction arôme module l\'intensité du café, de léger à intense, afin de s\'adapter au goût de chacun. Équipée d\'un panneau de commande simple et intuitive, la cafetière Smeg dispose de la fonction programmable pour lancer la préparation de votre café à l\'heure que vous voulez.',
            'image' => 'timemore_noire.jpg',
            'prix' => 23.00,
            'stock' => 56,
            'note' => 3.5,
            'gamme_id' => 3,
        ]);

        Article::create([
            'nom' => 'Delonghi EC9155.MB',
            'description' => 'Avec son kit Barista fourni, tout est inclus pour créer votre propre petit coin café comme au coffee shop !',
            'description_detaillee' => 'Le moulin intégré avec ses 8 réglages différents a été conçu pour dispenser une mouture uniforme et toujours constante. Vous avez le choix entre une ou deux doses de café moulu, selon la boisson désirée. Le broyage se fait automatiquement en appuyant le porte-filtre sous le moulin. La trémie a une capacité pour 180 g de café en grain.',
            'image' => 'delonghi_laspecialista_arte_4.jpg',
            'prix' => 479.00,
            'stock' => 64,
            'note' => 5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Green Lion Coffee 1kg',
            'description' => 'Café en grain bio Terre d\'avenir fabriqué en France par Green Lion Coffee.',
            'description_detaillee' => 'Découvrez l\'association de l\'arabica et du robusta avec le café en grain bio Green Lion Coffee, Terre d\'avenir. Certifié bio, ce café en grain possède de nombreux autres atouts, comme, sa composition faite majoritairement d\'arabica (80%) ou encore sa torréfaction totalement Made in France.',
            'image' => 'delonghi_laspecialista_arte_4.jpg',
            'prix' => 9.40,
            'stock' => 125,
            'note' => 4.5,
            'gamme_id' => 5,
        ]);

        Article::create([
            'nom' => 'Delonghi magnifica Smart FEB 2533 b',
            'description' => 'Look tendance Titanium, précise et particulièrement fiable, elle réalise facilement de parfaits expressos et cappuccinos grâce à sa buse vapeur améliorée intégrée.',
            'description_detaillee' => 'La Delonghi Magnifica S Smart Smart FEB 2541.TB dispose d\'une buse vapeur améliorée qui, au-delà de délivrer de la vapeur, vous promet une mousse de lait digne des meilleurs baristi italiens, et ce, sans effort :  les boissons à base de mousse de lait n\'auront plus de secrets pour vous !',
            'image' => 'ambiance_delonghi_2533_b.jpg',
            'prix' => 424.00,
            'stock' => 65,
            'note' => 2.5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Smeg Buse Vapeur Taupe',
            'description' => 'Laissez vous tenter par la nouvelle machine à café grain équipée d\'une buse vapeur de la célèbre marque Smeg.',
            'description_detaillee' => 'Cette machine à café avec moulin intégré dispose d\'un gabarit ultra compact, avec une largeur de 180 mm, permettant d\'être placée même dans les plus petites cuisines. Ses dimensions : hauteur 336 mm, largeur 180 mm, longueur 433 mm.',
            'image' => 'smeg_buse_vapeur.jpeg',
            'prix' => 719.90,
            'stock' => 49,
            'note' => 5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Perlé Purissima 1kg',
            'description' => 'Les amateurs d\'expresso retrouveront le côté fruité et rond de ce café, ainsi que ses notes de chocolat, de praliné et de zeste d\orange.',
            'description_detaillee' => 'Perléo Espresso vous propose ce mélange 100 % Arabica et vous garantit une tasse intense, à la hauteur de vos attentes. Torréfié à l\'italienne, ce café vous promet une belle expérience avec ses grains de café soigneusement cultivés et sélectionnés.',
            'image' => 'cafe_en_grain_purissima.jpg',
            'prix' => 23.50,
            'stock' => 204,
            'note' => 5,
            'gamme_id' => 5,
        ]);

        Article::create([
            'nom' => 'Ximum Moka Gelada 250g',
            'description' => 'Sourcé en Ethiopie, ce café en grain bio est un assemblage de plusieurs grains de café 100 % arabica.',
            'description_detaillee' => 'Découvrez ce café en grain arabica venu d\'Éthiopie et torréfié par Cafés Ximun au Pays Basque. C\'est un café de forêt apprécié du fait qu\'il soit un café responsable, offrant en tasse des notes de fleurs blanches, agrumes et de chocolat pour un résultat gourmand et fruité.',
            'image' => 'ximun_250g.jpg',
            'prix' => 10,
            'stock' => 264,
            'note' => 3,
            'gamme_id' => 5,
        ]);

        Article::create([
            'nom' => 'Cafetière filtre Moccamaster',
            'description' => 'Fabriquée à la main aux Pays-Bas.',
            'description_detaillee' => 'La qualité d’infusion des machines à café Moccamaster est une valeur sûre depuis 1964. Elles garantissent une tasse de café parfaite grâce à la maîtrise de paramètres techniques : température de l’eau, temps de contact entre l’eau et la mouture, température de maintien au chaud.',
            'image' => 'kbg-741-select-cafetiere-a-filtre-vert-pastel.jpg',
            'prix' => 262.90,
            'stock' => 71,
            'note' => 2.5,
            'gamme_id' => 4,
        ]);

        Article::create([
            'nom' => 'Cafetière à piston bodum',
            'description' => 'Découvrez la cafetière à piston Bodum Java noire 8 tasses de 1L au style rétro.',
            'description_detaillee' => 'La cafetière à piston Java de chez Bodum est la cafetière idéale pour préparer vos cafés, à partager entre amis ou en famille.  Simple, design et rapide, la cafetière à piston Java transforme les grains de café grossièrement moulus et l’eau chaude en des boissons savoureuses en quelques minutes.',
            'image' => 'Cafetière_piston Java.png',
            'prix' => 15.90,
            'stock' => 108,
            'note' => 5,
            'gamme_id' => 3,
        ]);

        Article::create([
            'nom' => 'Cafetière à piston Core Coffee Press',
            'description' => 'Découvrez cette cafetière à piston Core Coffee Press de Barista & Co.',
            'description_detaillee' => 'Cette cafetière à piston Barista & Co est équipée d\'une filtration double pour un meilleur résultat en tasse. Le filtre en inox du couvercle est à 360°. Ainsi, vous pouvez remettre le couvercle dans le sens que vous souhaitez.',
            'image' => 'baristaco_core_noir_3.jpg',
            'prix' => 31.90,
            'stock' => 80,
            'note' => 1.5,
            'gamme_id' => 4,
        ]);

        Article::create([
            'nom' => 'Machine expresso ASCASO Steel Uno',
            'description' => 'Avec finition bois est une machine expresso dédiée au plaisir, que celui-ci soit visuel ou gustatif.',
            'description_detaillee' => 'Cette Ascaso Steel Uno PID est vraiment polyvalente et permet, grâce aux filtres fournis, d\'extraire à partir de dosettes ESE (grâce au filtre dédié) ou café moulu (grâce aux deux filtres pressurisés et deux filtres simples). Un filtre aveugle est aussi fourni pour le backflush.',
            'image' => 'machine_expressoascaso_Steel_Uno.jpg',
            'prix' => 1380.00,
            'stock' => 38,
            'note' => 2,
            'gamme_id' => 1,
        ]);



        Article::factory(30)->create();
    }
}
