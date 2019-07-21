<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use App\Entity\RoEntity\Ur;
use App\Entity\CalendarEntity\ShiftType;
use App\Entity\RoEntity\Line;
use App\Entity\RoEntity\Uep;
use DateTime;
use App\Entity\CalendarEntity\DaySchedule;
use App\Entity\CalendarEntity\Schedule;


class DefautController extends AbstractController
{
    /**
     * @Route(path="/", name="router-action")
     *
     * @return Response
     */
    public function RouterAction() {
        return $this->render('router.html.twig');
    }


    /**
     * @Route(path="/{urAbbreviation}", name="index-action")
     *
     * @param string $urAbbreviation
     * @param EntityManagerInterface $em
     *
     * @return Response
     * @throws \Exception
     */
    public function indexAction(
        string $urAbbreviation,
        EntityManagerInterface $em
    ) {
        /** @var Ur $ur */
        $ur = $em->getRepository(Ur::class)->findOneBy(['abbreviation' => strtoupper($urAbbreviation)]);
        $urId = $ur->getId();
        if (empty($ur)) {
            throw new RouteNotFoundException();
        }


        //BE BRAVE

        $ueps = $em->getRepository(Uep::class)->findBy(['line' => $ur->getLines()->toArray()]);

        //$today = $em->getRepository(DaySchedule::class)->find(1);
        $calendarEm = $this->getDoctrine()->getManager("calendar_manager");
        /** @var ShiftType $today */
        $today = $calendarEm->getRepository(ShiftType::class)->find(1);

        $slovakDay = [
            1 => "PO",
            2 => "UT",
            3 => "ST",
            4 => "ŠT",
            5 => "PI",
            6 => "SO",
            7 => "NE"
        ];
        $currentDay = $slovakDay[date('w')];

        $currentDate = new DateTime();
        $currentDate = $currentDate->format('d-m-Y');

        //Process to display the whole week
        $firstDay = new DateTime();
        $lastDay = new DateTime();
        $lastDay = $lastDay->modify('+6 day');
        $week = $firstDay->format('w');

//        for ($i = $week ; $i>1; $i--){
//            $firstDay2 = $firstDay->modify('-1 day');
//        }


        //Call the bdd of calendar
        $calendarEm = $this->getDoctrine()->getManager("calendar_manager");
        //Display shift
        /** @var DaySchedule[] $shifts */
        $shifts = $calendarEm->getRepository(DaySchedule::class)->findShifts($firstDay, $lastDay, $urId);

        $rowDatas = [];
        /** @var DaySchedule $shift */
        foreach ($shifts as $shift) {
            $date = $shift->getDate()->format('Y-m-d');
            $keys = array_keys($rowDatas); //array_keys retourne toutes les clés d'un tableau

            if (in_array($date, $keys)) { //in_array indique si une valeur appartient à un tableau
                $rowDatas[$date][$shift->getShiftAbbreviation()] = [0,0,0,0,0,0,0,0,0,0,0,0,0];
            } else {
                $rowDatas[$date] = [$shift->getShiftAbbreviation() => [0,0,0,0,0,0,0,0,0,0,0,0,0]];
            }
        }

        dump($rowDatas);


        return $this->render(
            'default/index.html.twig',
            [
                'ur'            => $ur,
               // 'actualPeriod'  => $currentSchedule->getShiftType()->getAbbreviation(),
                'currentDate'   => $currentDate,
//                'shift'         => $daySchedule,
                'ueps'          => $ueps,
//                'stats'         => $stats,
//                'timeIntervals' => $timeIntervals,
//                'records'       => $records,
                'slovakDays' => $slovakDay,
                'today' => $today,
                'currentDay' => $currentDay,
                'firstDay' => $firstDay,
                'shift' => $shifts,
                'rowDatas' => $rowDatas
            ]
        );
    }

    /**
     * @Route(path="/api/testAjax/{ur}", methods={"POST"}, name="test-ajax-call-action")
     *
     * @param Request $request
     * @param string $ur
     *
     * @return JsonResponse
     */
    public function testAjaxCallAction(Request $request, string $ur)
    {
        try {
            $dateStr = $request->request->get('dateStr');
            $date = new \DateTime($dateStr);

            $html = $this->getTable($ur, $date);

            dump($date);
            dump($html);

            return new JsonResponse(['tableBody' => $html], Response::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => "Exception"], Response::HTTP_BAD_REQUEST);
        }
    }

    private function getTable(string $urAbbreviation, \DateTimeInterface $date)
    {
        $slovakDay = [
            1 => "PO",
            2 => "UT",
            3 => "ST",
            4 => "ŠT",
            5 => "PI",
            6 => "SO",
            7 => "NE"
        ];

        // get default manager
        $em = $this->getDoctrine()->getManager();
        /** @var Ur $ur */
        $ur = $em->getRepository(Ur::class)->findOneBy(['abbreviation' => strtoupper($urAbbreviation)]);
        if (empty($ur)) {
            throw new RouteNotFoundException();
        }

        /** @var Uep[] $ueps */
        $ueps = $em->getRepository(Uep::class)->findBy(['line' => $ur->getLines()->toArray()]);

        $calendarEm = $this->getDoctrine()->getManager("calendar_manager");

        /** @var ShiftType $today */
        $today = $calendarEm->getRepository(ShiftType::class)->find(1);
        $currentDay = $slovakDay[$date->format('w')];

        //Process to display the whole week
        $firstDay = $date;
        $week = $firstDay->format('w');

//        for ($i = $week ; $i>1; $i--){
//            $firstDay2 = $firstDay->modify('-1 day');
//        }
        return $this->renderView(
            'default/tableBody.html.twig',
            [
                'ur'            => $ur,
                'currentDate'   => $date,
                'ueps'          => $ueps,
                'slovakDays' => $slovakDay,
                'today' => $today,
                'currentDay' => $currentDay,
                'firstDay' => $firstDay
            ]
        );
    }
}