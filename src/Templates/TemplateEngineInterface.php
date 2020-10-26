<?php

namespace Cursos\Templates;

use Psr\Http\Message\ResponseInterface;


interface TemplateEngineInterface {

    public function render(ResponseInterface $response, string $template, array $params);
    
}