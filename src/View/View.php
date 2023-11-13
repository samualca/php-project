<?php

namespace src\View;

class View
{
    private string $template_path;
    private string $view_template;
    private array $variables;

    private function __construct(string $template_path, string $view_template, array $variables)
    {
        $this->template_path = $template_path;
        $this->variables = $variables;
        $this->view_template = $view_template;
    }

    public static function generate(string $view_template, array $variables)
    {
        $template_path = __DIR__ . '/../../app/View/' . $view_template . '.php';
        return new self($template_path, $view_template, $variables);
    }

    public function visualize()
    {
        if ($this->variables) {
            extract($this->variables);
        }
        require $this->template_path;
    }
}