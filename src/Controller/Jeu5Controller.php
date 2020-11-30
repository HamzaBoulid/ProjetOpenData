<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;



    
class Jeu5Controller extends AbstractController
{

    /**
     * @Route("/jeu5", name="jeu5")
     */
    public function jeu5()
    {
        $combo = new ComboChart();
        //Données
        $combo->getData()->setArrayToDataTable(
            [
                ['Vague', 'Mesures d\'hygiène F', 'Mesures d\'hygiène H', 'Nombre de cas positifs'],
                ['30 mars - 1 avr', 57.6 , 41.5 , 44550],
               ['14-16 avr', 54.8, 38, 108847],
               ['20-22 avr', 51.1 , 40.2 , 119151],
               ['28-30 avr', 50.2 , 35.5 ,  129581],
               ['4-6 mai', 52.7 , 35.3 ,  137150],
               ['13-15 mai', 50, 35.1, 141919],
               ['18-20 mai', 48.7 , 33.7 , 142291],
               ['27-29 mai', 48.1 , 35.2 , 149668],
               ['8-10 juin', 45 , 27.7 , 155136],
               ['22-24 juin', 42.1 , 29.2 ,  161348],
               ['6-8 juillet', 40.1 , 29.3 ,  169473],
               ['20-22 juillet', 40.4 , 29.5 ,  178336],
               ['24-26 août', 38.4, 23.6, 253587],
               ['21-23 sept', 38.9 , 25.1 ,  481141],
               ['19-21 oct.', 41 , 33 , 957421],
              ]
        );

        //Deux axes
        $vAxis1 = new VAxis();
        $vAxis1->setTitle('Respect des 4 mesures d\'hygiène');
        $vAxis2 = new VAxis();
        $vAxis2->setTitle('Nombre de cas covid (France)');
        $combo->getOptions()->setVAxes([$vAxis1, $vAxis2]);


        /* Mesures F */
        $series1 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series1->setType('bars');
        $series1->setTargetAxisIndex(0);
        $series1->setColor('#1A0CE6'); 


         /* Mesures H */
         $series2 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series2->setType('bars');
         $series2->setTargetAxisIndex(0);
         $series2->setColor('#FF33FF');
    

        /* Nombre de cas covid positifs*/
        $series3 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series3->setType('line');
        $series3->setTargetAxisIndex(1);
        $series3->setColor('red');


    
        $combo->getOptions()->setSeries([$series2, $series1, $series3]);
        $combo->getOptions()->getHAxis()->setTitle('Vague');
        $combo->getOptions()->setTitle('Respect des mesures d\'hygiène de la part des H/F lors de l\'épidémie covid19');
        $combo->getOptions()->setWidth(1200);
        $combo->getOptions()->setHeight(800);

        return $this->render('jeu5/jeu5.html.twig', array('combo' => $combo));
    }    

}


