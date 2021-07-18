<?php
class templateEngine
{
    public function render(string $template, array $params, string $layout) {
        $template = $_SERVER['DOCUMENT_ROOT'] . '/template/common/' . $template . '.php';
        extract($params);
        $layout = $_SERVER['DOCUMENT_ROOT'] . '/template/pages/' . $layout . '.php';
        if (file_exists($template)) {
            ob_start();
            include($layout);
            $main = ob_get_clean();
            ob_clean();
            ob_start();
            include($template);
            $output = ob_get_clean();
        }
        else {
            $output = '';
        }
        return $output;
    }
}