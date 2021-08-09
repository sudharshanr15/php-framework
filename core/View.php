<?php

namespace app\core;

class View{
    public function renderLayout(){// to render the main layout file of the application
        ob_start();
        include_once Application::$ROOT_DIR . "\\views\\index.views.php";
        return ob_get_clean();
    }

    public function renderContent($view, array $content = []){ // to render only the content inside the layout
        foreach($content as $key=>$value){
            $$key = $value; // to access the array key as variables on the content page
        }

        ob_start();
        include_once Application::$ROOT_DIR . "\\views\\$view.php";
        return ob_get_clean();
    }

    public function renderView($view, array $content = []){ // to combine layout and content file as a view
        $layout = $this->renderLayout();
        $contentView = $this->renderContent($view, $content);
        return str_replace("{{content}}", $contentView, $layout);
    }
}