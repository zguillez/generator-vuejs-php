<?php

class ApiController extends Controller
{
  public function __invoke($request, $response, array $args)
  {
    unset($request, $args);
    return $this->json($response, ['status' => 200]);
  }

  public function get_token($request, $response, array $args)
  {
    unset($request);
    $token = $args['token'];
    $result = $this->database->sql2array("SELECT * FROM config WHERE ref='$token'");
    return $this->json($response, ['status' => 200, 'token' => $token, 'result' => $result]);
  }

  public function post_token($request, $response, array $args)
  {
    unset($args);
    $body = $request->getParsedBody();
    return $this->json($response, ['status' => 200, 'body' => $body]);
  }
}
