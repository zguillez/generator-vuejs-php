<?php

class Controller
{
    protected $view;
    protected $config;
    protected $database;

    public function __construct(Psr\Container\ContainerInterface $container)
    {
        $this->view = $container->get('view');
        $this->config = $container->get('config');
        $this->database = $container->get('database');
    }

    protected function html($response, $data)
    {
        $response->getBody()->write($data);

        return $response->withHeader('Content-Type', 'text/html');
    }

    protected function json($response, $data)
    {
        $response->getBody()->write(json_encode($data));

        return $response->withHeader('Content-Type', 'application/json');
    }

    protected function txt($response, $data)
    {
        $response->getBody()->write($data);

        return $response->withHeader('Content-Type', 'text/plain');
    }

    protected function log()
    {
        if ( ! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $session = session_id();
        $server = json_encode($_SERVER);
        $created_at = date('Y-m-d H:i:s');
        //--------------------------------------------------
        $user = $_SERVER['USER'] ?? "";
        $home = $_SERVER['HOME'] ?? "";
        $script_name = $_SERVER['SCRIPT_NAME'] ?? "";
        $request_uri = $_SERVER['REQUEST_URI'] ?? "";
        $query_string = $_SERVER['QUERY_STRING'] ?? "";
        $request_method = $_SERVER['REQUEST_METHOD'] ?? "";
        $server_protocol = $_SERVER['SERVER_PROTOCOL'] ?? "";
        $gateway_interface = $_SERVER['GATEWAY_INTERFACE'] ?? "";
        $remote_port = $_SERVER['REMOTE_PORT'] ?? "";
        $script_filename = $_SERVER['SCRIPT_FILENAME'] ?? "";
        $server_admin = $_SERVER['SERVER_ADMIN'] ?? "";
        $context_document_root = $_SERVER['CONTEXT_DOCUMENT_ROOT'] ?? "";
        $context_prefix = $_SERVER['CONTEXT_PREFIX'] ?? "";
        $request_scheme = $_SERVER['REQUEST_SCHEME'] ?? "";
        $document_root = $_SERVER['DOCUMENT_ROOT'] ?? "";
        $remote_addr = $_SERVER['REMOTE_ADDR'] ?? "";
        $server_port = $_SERVER['SERVER_PORT'] ?? "";
        $server_addr = $_SERVER['SERVER_ADDR'] ?? "";
        $server_name = $_SERVER['SERVER_NAME'] ?? "";
        $server_software = $_SERVER['SERVER_SOFTWARE'] ?? "";
        $server_signature = $_SERVER['SERVER_SIGNATURE'] ?? "";
        $path = $_SERVER['PATH'] ?? "";
        $http_accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? "";
        $http_accept_encoding = $_SERVER['HTTP_ACCEPT_ENCODING'] ?? "";
        $http_sec_fetch_dest = $_SERVER['HTTP_SEC_FETCH_DEST'] ?? "";
        $http_sec_fetch_user = $_SERVER['HTTP_SEC_FETCH_USER'] ?? "";
        $http_sec_fetch_mode = $_SERVER['HTTP_SEC_FETCH_MODE'] ?? "";
        $http_sec_fetch_site = $_SERVER['HTTP_SEC_FETCH_SITE'] ?? "";
        $http_accept = $_SERVER['HTTP_ACCEPT'] ?? "";
        $http_user_agent = $_SERVER['HTTP_USER_AGENT'] ?? "";
        $http_upgrade_insecure_requests = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'] ?? "";
        $http_sec_ch_ua_platform = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ?? "";
        $http_sec_ch_ua_mobile = $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ?? "";
        $http_sec_ch_ua = $_SERVER['HTTP_SEC_CH_UA'] ?? "";
        $http_connection = $_SERVER['HTTP_CONNECTION'] ?? "";
        $http_host = $_SERVER['HTTP_HOST'] ?? "";
        $proxy_nokeepalive = $_SERVER['proxy-nokeepalive'] ?? "";
        $ssl_tls_sni = $_SERVER['SSL_TLS_SNI'] ?? "";
        $https = $_SERVER['HTTPS'] ?? "";
        $http_authorization = $_SERVER['HTTP_AUTHORIZATION'] ?? "";
        $passenger_download_native_support_binary = $_SERVER['PASSENGER_DOWNLOAD_NATIVE_SUPPORT_BINARY'] ?? "";
        $passenger_compile_native_support_binary = $_SERVER['PASSENGER_COMPILE_NATIVE_SUPPORT_BINARY'] ?? "";
        $unique_id = $_SERVER['UNIQUE_ID'] ?? "";
        $fcgi_role = $_SERVER['FCGI_ROLE'] ?? "";
        $php_self = $_SERVER['PHP_SELF'] ?? "";
        $request_time_float = $_SERVER['REQUEST_TIME_FLOAT'] ?? "";
        $request_time = $_SERVER['REQUEST_TIME'] ?? "";
        //--------------------------------------------------
        $sql = <<<SQL
INSERT IGNORE INTO logs (
    ip, session, server, created_at,
    user, home, script_name, request_uri, query_string, request_method, server_protocol, gateway_interface,
    remote_port, script_filename, server_admin, context_document_root, context_prefix, request_scheme,
    document_root, remote_addr, server_port, server_addr, server_name, server_software, server_signature,
    path, http_accept_language, http_accept_encoding, http_sec_fetch_dest, http_sec_fetch_user, http_sec_fetch_mode,
    http_sec_fetch_site, http_accept, http_user_agent, http_upgrade_insecure_requests, http_sec_ch_ua_platform,
    http_sec_ch_ua_mobile, http_sec_ch_ua, http_connection, http_host, proxy_nokeepalive, ssl_tls_sni, https,
    http_authorization, passenger_download_native_support_binary, passenger_compile_native_support_binary,
    unique_id, fcgi_role, php_self, request_time_float, request_time
) VALUES (
    '$ip', '$session', '$server', '$created_at',
    '$user', '$home', '$script_name', '$request_uri', '$query_string', '$request_method', '$server_protocol',
    '$gateway_interface', '$remote_port', '$script_filename', '$server_admin', '$context_document_root',
    '$context_prefix', '$request_scheme', '$document_root', '$remote_addr', '$server_port', '$server_addr',
    '$server_name', '$server_software', '$server_signature', '$path', '$http_accept_language',
    '$http_accept_encoding', '$http_sec_fetch_dest', '$http_sec_fetch_user', '$http_sec_fetch_mode',
    '$http_sec_fetch_site', '$http_accept', '$http_user_agent', '$http_upgrade_insecure_requests',
    '$http_sec_ch_ua_platform', '$http_sec_ch_ua_mobile', '$http_sec_ch_ua', '$http_connection', '$http_host',
    '$proxy_nokeepalive', '$ssl_tls_sni', '$https', '$http_authorization', '$passenger_download_native_support_binary',
    '$passenger_compile_native_support_binary', '$unique_id', '$fcgi_role', '$php_self', '$request_time_float',
    '$request_time'
);
SQL;
        // var_dump($sql);
        $this->database->sql($sql);
    }
}
