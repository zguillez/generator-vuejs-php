<?php

namespace services;

class ApiController extends Controller
{
  public function __invoke($request, $response, array $args)
  {
    $this->log2($request, $args);

    return $this->json($response, ['status' => 200]);
  }

  public function get_token($request, $response, array $args)
  {
    $this->log2($request, $args);
    $token = $args['token'];
    $result = $this->database->sql2array("SELECT * FROM config WHERE ref='$token'");

    return $this->json($response, ['status' => 200, 'token' => $token, 'result' => $result]);
  }

  public function post_token($request, $response, array $args)
  {
    $this->log2($request, $args);
    $body = $request->getParsedBody();

    return $this->json($response, ['status' => 200, 'body' => $body]);
  }

  public function login($request, $response, array $args)
  {
    $this->log2($request, $args);
    $body = $request->getParsedBody();
    $output = ['status' => 200, 'body' => $body];
    $now = $this->getNow();
    $token = '0';
    $sql = '';
    if (isset($body['user']) && $body['user'] != '' && isset($body['password']) && $body['password'] != '') {
      $user = $body['user'];
      $password = hash('sha256', $body['password']);
      $sql = "SELECT * FROM oauth WHERE user='$user' AND password='$password'";
      $body['sql1'] = urlencode($sql);
      $result = $this->database->sql2Array($sql);
      if ( ! empty($result)) {
        $token = hash('sha256', 'l1nk3m@nn'.$body['password'].$body['password'].$now);
        $sql = "UPDATE oauth SET token='$token', updated_at='$now' WHERE user='$user' AND password='$password'";
        $body['sql2'] = urlencode($sql);
        $this->database->sql($sql);
        setcookie("token", $token, time() + 3600, "/");
      }
    }
    $output['token'] = $token;
    $this->log('login', urlencode($sql), $output);

    return $this->json($response, $output);
  }
}
