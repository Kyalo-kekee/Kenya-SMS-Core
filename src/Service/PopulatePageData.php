<?php

namespace App\Service;

class PopulatePageData
{
    public string $global_menu;

    public  array $data;

    public function __construct(string $controller, string $menu_template, bool $defaults =true , array $data =[])
    {
        $defaults ? $this ->global_menu = false : $this ->global_menu = true;

        $page_data = array(
            'controller' => $controller,
            'global_menu' => $this->global_menu,
            'menu' => $menu_template
        );

      $this ->data =  array_merge($page_data,$data);

    }
    public  function  get()
    {
        return $this ->data;
    }
}