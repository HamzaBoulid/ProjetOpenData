<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;



    
class Jeu2Controller extends AbstractController
{

    /**
     * @Route("/jeu2", name="jeu2")
     */
    public function jeu2()
    {
        $combo = new ComboChart();
        //Données
        $combo->getData()->setArrayToDataTable(
            [
                ['Année', 'Taux de réussite générale H', 'Taux de réussite générale F', 'Taux de demandeurs d\'emploi H', 'Taux de demandeurs d\'emploi H'],
                ['2003',  12.7   , 12.4, 50.71 ,49.29],
                ['2004',  12.4   ,9.3 , 50.42 ,49.58],
                ['2005', 12.7 , 9.4 , 50.26 , 49.74],
                ['2006',  12.9 , 9.6 , 49.47 , 50.53 ],
                ['2007', 13.5 , 9.3 , 48.74 , 51.26],
                ['2008', 12.2 , 8.8 , 49.84 , 50.16],
                ['2009',  12.9 , 9.1 , 54 , 46],
                ['2010', 13.6 , 9 , 52.96 , 47.04],
                ['2011', 12.6 , 9.2 , 51.33 , 48.67 ],
                ['2012',  12.2 , 8.9 , 52.28 , 47.72  ],
                ['2013',  10.8 , 8.7 , 53.09 , 46.91],
                ['2014', 9.9 , 7.8 , 53.72 , 46.28],
                ['2015',  10.1 , 8.4, 53.92 , 46.08],
                ['2016',  10.1 ,11.5 , 53.64 , 46.36],
                ['2017',  10.5 , 7.2 , 52.88 , 47.12],
                ['2018', 10.8 , 6.9, 52.28, 47.72]
              ]
        );

        //Deux axes
        $vAxis1 = new VAxis();
        $vAxis1->setTitle('Taux de réussite générale');
        $vAxis2 = new VAxis();
        $vAxis2->setTitle('Taux d\'emploi');
        $combo->getOptions()->setVAxes([$vAxis1, $vAxis2]);


        /* Taux de réussite générale H */
        $series1 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series1->setType('bars');
        $series1->setTargetAxisIndex(0);
        $series1->setColor('#FFBC00');


         /* Taux de réussite générale F */
         $series2 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series2->setType('bars');
         $series2->setTargetAxisIndex(0);
         $series2->setColor('#8718DB');
        
        
        /* Taux de demandeurs d'emploi H*/
        $series3 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series3->setType('line');
        $series3->setTargetAxisIndex(1);
        $series3->setColor('#005EFF');

         /* Taux de demandeurs d'emploi F*/
         $series4 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series4->setType('line');
         $series4->setTargetAxisIndex(1);
         $series4->setColor('#FF00EF');
 

    
        $combo->getOptions()->setSeries([$series1, $series2, $series3, $series4]);
        $combo->getOptions()->getHAxis()->setTitle('Année');
        $combo->getOptions()->setTitle('Taux de réussite aux diplômes par rapport aux taux de demandeurs d\'emploi');
        $combo->getOptions()->setWidth(1200);
        $combo->getOptions()->setHeight(800);

        return $this->render('jeu2/jeu2.html.twig', array('combo' => $combo));
    }    

}


