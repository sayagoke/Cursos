<?php

namespace Cursos\Templates;

use Psr\Http\Message\ResponseInterface;

final class TwigTemplateEngine implements TemplateEngineInterface {

    /**
     * @var \Twig\Environment
     */
    private $templateEngine;

    // constructor receives container instance
    public function __construct(\Twig\Environment $templateEngine) {
        $this->templateEngine = $templateEngine;
    }
    
    public function render(ResponseInterface $response, string $template, array $params) {
        $template = $this->templateEngine->load($template);
        $response->getBody()->write($template->render($params));
        return $response;
    }

}