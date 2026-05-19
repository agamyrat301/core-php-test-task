<?php

use Smarty\Smarty;

abstract class Controller
{
    protected Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(BASE_PATH . '/Views/');
        $this->smarty->setCompileDir(BASE_PATH . '/storage/smarty/compile/');
        $this->smarty->setCacheDir(BASE_PATH . '/storage/smarty/cache/');
        $this->smarty->caching = false;
    }

    protected function view(string $template, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        $this->smarty->display($template . '.tpl');
    }
}
