<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;



    
class Jeu3Controller extends AbstractController
{

    /**
     * @Route("/jeu3", name="jeu3")
     */
    public function jeu3()
    {
        $combo = new ComboChart();
        //Données
        $combo->getData()->setArrayToDataTable(
            [
                ['Vague', 'Anxiété H', 'Dépression H', 'Anxiété F', 'Dépression F', 'Nombre de cas positifs'],
                ['30 mars - 1 avr', 16.6 , 21.1 , 26 , 18.5, 44550],
               ['14-16 avr', 14.4 , 19.7 ,21.5 , 15.3, 108847],
               ['20-22 avr', 13.6 , 23 ,23.7 ,17.6, 119151],
               ['28-30 avr', 14.7 ,20.5 , 21.2 , 18, 129581],
               ['4-6 mai', 15.1 , 21.2 , 21.4 ,15.7, 137150],
               ['13-15 mai', 15.7 , 14.7, 19.3 , 13.4, 141919],
               ['18-20 mai', 12.9 , 13.7 , 20.5 , 10.2, 142291],
               ['27-29 mai', 13.4 , 12.3 , 19.3 , 12.2, 149668],
               ['8-10 juin', 14.8 , 12.8, 17 , 9.8, 155136],
               ['22-24 juin', 12.2 , 11.4 , 17.7 , 10.9, 161348],
               ['6-8 juillet', 11.7 , 11.7 , 21.9 , 9.4,  169473],
               ['20-22 juillet', 12.4 , 11.9 , 22.2 , 11.4, 178336],
               ['24-26 août', 13.4, 12.9, 21.2, 10.5, 253587],
               ['21-23 sept', 14.8 , 11.2 , 21 , 10.7, 481141],
               ['19-21 oct.', 14.9 , 17.9 , 22.9 , 13, 957421],
              ]
        );

        //Deux axes
        $vAxis1 = new VAxis();
        $vAxis1->setTitle('nveaux d\'Anxiété, dépression');
        $vAxis2 = new VAxis();
        $vAxis2->setTitle('Nombre de cas covid (France)');
        $combo->getOptions()->setVAxes([$vAxis1, $vAxis2]);


        /* Anxiété H */
        $series1 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series1->setType('bars');
        $series1->setTargetAxisIndex(0);
        $series1->setColor('#1A0CE6');


         /* Dépression H */
         $series2 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series2->setType('bars');
         $series2->setTargetAxisIndex(0);
         $series2->setColor('#0ED4FC');
        
        
        /* Anxiété F*/
        $series3 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series3->setType('bars');
        $series3->setTargetAxisIndex(0);
        $series3->setColor('#FF33FF');

         /* Dépression F*/
         $series4 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
         $series4->setType('bars');
         $series4->setTargetAxisIndex(0);
         $series4->setColor('#CB11BF');

        /* Nombre de cas covid positifs*/
        $series5 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series5->setType('line');
        $series5->setTargetAxisIndex(1);
        $series5->setColor('red');


    
        $combo->getOptions()->setSeries([$series1, $series2, $series3, $series4, $series5]);
        $combo->getOptions()->getHAxis()->setTitle('Vague');
        $combo->getOptions()->setTitle('Niveaux d\'anxiété et de dépression H/F pendant l\'épidemie covid19');
        $combo->getOptions()->setWidth(1200);
        $combo->getOptions()->setHeight(800);

        return $this->render('jeu3/jeu3.html.twig', array('combo' => $combo));
    }    

}


