<?php
 namespace Bridge\Src\Helpers;
use Symfony\Component\HttpFoundation\Request;

class MenuInfo
{

    public const MENU_SCHOOL_SETUP = 'masterpages/menus/school_and_setup.twig';
    public  const MENU_EXAM_CENTER = 'masterpages/menus/exam_center.twig';
    public  const MENU_STUDENT_CENTER = 'masterpages/menus/student_center.twig';
    public  const MENU_SYSTEM_SETTINGS = 'masterpages/menus/settings.twig';



    public  static  function Seed(Request $request)
    {
        if ($request->get('seed') == 1){
            return true;
        }
        return false;
    }
}