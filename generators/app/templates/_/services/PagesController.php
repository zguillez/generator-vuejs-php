<?php

class PagesController extends Controller
{
    public function __invoke($request, $response, array $args)
    {
        unset($request, $args);
        return $this->view->render($response, 'index.twig', ['title' => 'Hello PHP!']);
    }
}