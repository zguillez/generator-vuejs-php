# client

This template should help get you started developing with Vue 3 in Vite.

## Project Setup

```sh
npm run init
```

### Compile and Hot-Reload for Development

```sh
npm run serve
npm run serve:client
npm run serve:server

```

### Compile and Minify for Production

```sh
npm run build
```

## Husky

```npx husky add .husky/pre-commit "npm test"```

```sh
#!/usr/bin/env sh
. "$(dirname -- "$0")/_/husky.sh"

npm run clean
npm run test:1
npm run test:2
npm run test:3

```

## Logs database

```sql
CREATE TABLE IF NOT EXISTS logs
(
  id         INT AUTO_INCREMENT
    PRIMARY KEY,
  ref        VARCHAR(255) DEFAULT ''                NOT NULL,
  api        VARCHAR(255) DEFAULT ''                NOT NULL,
  method     VARCHAR(32)  DEFAULT ''                NOT NULL,
  log        VARCHAR(255) DEFAULT ''                NOT NULL,
  request    TEXT                                   NOT NULL,
  response   TEXT                                   NOT NULL,
  ip         VARCHAR(255) DEFAULT ''                NOT NULL,
  created_at DATETIME     DEFAULT CURRENT_TIMESTAMP NOT NULL
)
  CHARSET = utf8;

CREATE INDEX logs_ip_index ON logs (ip);
CREATE INDEX logs_ref_index ON logs (ref);
```

```sql
CREATE TABLE IF NOT EXISTS logs2
(
  id                                       INT AUTO_INCREMENT
    PRIMARY KEY,
  ip                                       VARCHAR(255) DEFAULT '0.0.0.0'           NOT NULL,
  session                                  TEXT                                     NOT NULL,
  server                                   TEXT                                     NOT NULL,
  created_at                               TIMESTAMP    DEFAULT CURRENT_TIMESTAMP() NOT NULL,
  user                                     VARCHAR(255) DEFAULT ''                  NOT NULL,
  home                                     VARCHAR(255) DEFAULT ''                  NOT NULL,
  script_name                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  request_uri                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  query_string                             VARCHAR(255) DEFAULT ''                  NOT NULL,
  request_method                           VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_protocol                          VARCHAR(255) DEFAULT ''                  NOT NULL,
  gateway_interface                        VARCHAR(255) DEFAULT ''                  NOT NULL,
  remote_port                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  script_filename                          VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_admin                             VARCHAR(255) DEFAULT ''                  NOT NULL,
  context_document_root                    VARCHAR(255) DEFAULT ''                  NOT NULL,
  context_prefix                           VARCHAR(255) DEFAULT ''                  NOT NULL,
  request_scheme                           VARCHAR(255) DEFAULT ''                  NOT NULL,
  document_root                            VARCHAR(255) DEFAULT ''                  NOT NULL,
  remote_addr                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_port                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_addr                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_name                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_software                          VARCHAR(255) DEFAULT ''                  NOT NULL,
  server_signature                         VARCHAR(255) DEFAULT ''                  NOT NULL,
  path                                     VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_accept_language                     VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_accept_encoding                     VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_fetch_dest                      VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_fetch_user                      VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_fetch_mode                      VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_fetch_site                      VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_accept                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_user_agent                          VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_upgrade_insecure_requests           VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_ch_ua_platform                  VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_ch_ua_mobile                    VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_sec_ch_ua                           VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_connection                          VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_host                                VARCHAR(255) DEFAULT ''                  NOT NULL,
  proxy_nokeepalive                        VARCHAR(255) DEFAULT ''                  NOT NULL,
  ssl_tls_sni                              VARCHAR(255) DEFAULT ''                  NOT NULL,
  https                                    VARCHAR(255) DEFAULT ''                  NOT NULL,
  http_authorization                       VARCHAR(255) DEFAULT ''                  NOT NULL,
  passenger_download_native_support_binary VARCHAR(255) DEFAULT ''                  NOT NULL,
  passenger_compile_native_support_binary  VARCHAR(255) DEFAULT ''                  NOT NULL,
  unique_id                                VARCHAR(255) DEFAULT ''                  NOT NULL,
  fcgi_role                                VARCHAR(255) DEFAULT ''                  NOT NULL,
  php_self                                 VARCHAR(255) DEFAULT ''                  NOT NULL,
  request_time_float                       VARCHAR(255) DEFAULT ''                  NOT NULL,
  request_time                             VARCHAR(255) DEFAULT ''                  NOT NULL
)
  CHARSET = utf8;

CREATE INDEX logs2_ip_index ON logs2 (ip);
CREATE INDEX logs2_request_uri_index ON logs2 (request_uri);
```
