<?php

namespace services;

class PagesController extends Controller
{
  public function __invoke($request, $response, array $args)
  {
    unset($request, $args);
    $this->log();

    return $this->view->render($response, 'index.twig', ['title' => 'Hello PHP!']);
  }

  public function redirect_home($request, $response, array $args)
  {
    unset($request, $args);
    $this->log();
    header("Location: /");
    exit();
  }
}
