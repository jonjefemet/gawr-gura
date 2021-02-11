<?php

namespace App\GuraTools;

use Throwable;

abstract class View
{

    /**
     * Template being rendered.
     */
    private string $folder = "";
    private string $view = "";

    /**
     * Initialize a new view context.
     */
    public function __construct()
    {
    }

    /**
     * Safely escape/encode the provided data.
     */
    public function h($data)
    {
        return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Render the template, returning it's content.
     * @param array $data Data made available to the view.
     * @return string The rendered template.
     */
    public function render(string $view, array $data = [])
    {
        $route_view = $this->getRouteView($view);

        extract($data);

        include($route_view);
    }

    public function renderPartial(string $view, array $data = [])
    {
        $route_view = $this->getRouteView($view);
        extract($data);
        ob_start();
        include($route_view);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function getRouteView(string $view)
    {

        $array_view = explode("/", $view);
        switch (count($array_view)) {
            case 0:
                new Throwable("View Not Found", 1);
                break;
            case 1:
                $this->view = $view;
                $this->folder = $this->getFolderName();
                return APP_PATH . "/app/Views/" . $this->folder . "/" . $this->view . ".php";
                break;
            case 2:
                $this->view = $array_view[1];
                $this->folder = $array_view[0];
                return APP_PATH . "/app/Views/" . $this->folder . "/" . $this->view . ".php";
                break;
            default:
                return APP_PATH . "/app/" . $view . ".php";
                break;
        }
        #print_r($array_view);
    }

    public function getFolderName()
    {
        // Captura o nome da class atual
        $current   = get_class($this);
        // Remove o caminho desnecessários somente o nome do controller
        $ClassName = str_replace("App\\Controllers\\", "", $current);
        // Remove a palavra Controller, para corrigir o nome do diretório da view
        $filterFolder = str_replace("Controller", "", $ClassName);

        return $filterFolder;
    }
}
