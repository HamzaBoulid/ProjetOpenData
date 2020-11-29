<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;



    
class Jeu4Controller extends AbstractController
{

    /**
     * @Route("/jeu4", name="jeu4")
     */
    public function jeu4()
    {
        $combo = new ComboChart();
        //Données
        $combo->getData()->setArrayToDataTable(
            [
                ['Année', 'Taux de reussite H', 'Taux de réussite F', ' Salaire H', 'Salaire F'],
                ['2008', 12.2 , 9.6 , 2236 , 1776],
                ['2009', 12.9 , 9.1 , 2257 , 1812],
                ['2010', 13.6 , 9 , 2303 , 1851],
                ['2011', 12.6 , 9.2 , 2343 , 1893],
                ['2012', 12.2 , 8.9 , 2378 , 1927],
                ['2013', 10.8 , 8.7 , 2389 , 1945],
                ['2014', 9.9 , 8.7 , 2410 , 1971],
                ['2015', 10.1 , 8.4 , 2438 , 1997],
                ['2016', 10.1 , 7.5 , 2451 , 2016],
                ['2017', 10.5 , 7.2 , 2488 , 2069]
           ]
        );

        //Deux axes
        $vAxis1 = new VAxis();
        $vAxis1->setTitle('Taux de réussite en %');
        $vAxis2 = new VAxis();
        $vAxis2->setTitle('Salaire net mensuel');
        $combo->getOptions()->setVAxes([$vAxis1, $vAxis2]);


        /* Taux réussite H*/
        $series1 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series1->setType('bars');
        $series1->setTargetAxisIndex(0);
        $series1->setColor('#1A0CE6');


         /*  Taux réussite F*/
         $series2 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series2->setType('bars');
         $series2->setTargetAxisIndex(0);
         $series2->setColor('#FF33FF');
        
        
        /* Salaire H*/
        $series3 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series3->setType('line');
        $series3->setTargetAxisIndex(1);
        $series3->setColor('#0ED4FC');

         /* Salaire F*/
         $series4 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series4->setType('line');
         $series4->setTargetAxisIndex(1);
         $series4->setColor('#CB11BF');
    
        $combo->getOptions()->setSeries([$series1,$series2, $series3, $series4]);
        $combo->getOptions()->getHAxis()->setTitle('Année');
        $combo->getOptions()->setTitle('Salaires nets mensuels H/F comparé aux taux de réussite en enseignement supérieur');
        $combo->getOptions()->setWidth(1200);
        $combo->getOptions()->setHeight(800);

        return $this->render('jeu4/jeu4.html.twig', array('combo' => $combo));
    }    

}


