<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;



    
class Jeu1Controller extends AbstractController
{

    /**
     * @Route("/jeu1", name="jeu1")
     */
    public function jeu1()
    {
        $combo = new ComboChart();
        //Données
        $combo->getData()->setArrayToDataTable(
            [
                ['Année', 'Naissances H/F', 'Taux d\'emploi H', 'Taux d\'emploi F'],
                ['1985',  796138   , 78.3, 57],
                ['1995',  759058  , 74.9, 61.1],
                ['2000', 807405, 74.9, 61.1],
                ['2005',  806822 , 75.2 , 64.7],
                ['2010',  832799  , 74.9, 66.1]
              ]
        );

        //Deux axes
        $vAxis1 = new VAxis();
        $vAxis1->setTitle('Nombre de nouveaux nés');
        $vAxis2 = new VAxis();
        $vAxis2->setTitle('Taux d\'emploi');
        $combo->getOptions()->setVAxes([$vAxis1, $vAxis2]);


        /* Naissances Total */
        $series1 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series1->setType('bars');
        $series1->setTargetAxisIndex(0);
        $series1->setColor('#FFBC00');
        
        
        /* Taux d'emploi H*/
        $series3 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series3->setType('line');
        $series3->setTargetAxisIndex(1);
        $series3->setColor('#005EFF');

         /* Taux d'emploi F*/
         $series4 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series4->setType('line');
         $series4->setTargetAxisIndex(1);
         $series4->setColor('#FF00EF');
 

    
        $combo->getOptions()->setSeries([$series1, $series3, $series4]);
        $combo->getOptions()->getHAxis()->setTitle('Année');
        $combo->getOptions()->setTitle('Taux d\'emploi H/F par naissances');
        $combo->getOptions()->setWidth(1200);
        $combo->getOptions()->setHeight(800);

        return $this->render('jeu1/jeu1.html.twig', array('combo' => $combo));
    }    

}


