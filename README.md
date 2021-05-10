# symfony4_restapi_oauth_server
REST API Server with Symfony 4.4 and OAuth2 

## Requirements
* PHP 7.4 (it should also run with PHP7.2 and PHP7.3, not tested though)
* Composer 2 (https://getcomposer.org/)
* Symfony 4.4 (https://symfony.com/doc/4.4)
* FOSRestBundle (https://github.com/FriendsOfSymfony/FOSRestBundle)
* Trikoder OAuth 2 Bundle (https://github.com/trikoder/oauth2-bundle, https://github.com/trikoder/oauth2-bundle/blob/v3.x/docs/basic-setup.md )
* MariaDB (or Postgres)

## Installation Instructions

* Clone the repository:
```sh
git clone git@github.com:vkfd/symfony4_restapi_oauth_server.git
```


* Go to the directory (symfony4_restapi_oauth_server) and download Composer 2:
```sh
wget https://getcomposer.org/download/latest-2.x/composer.phar
```

* Install composer packages:
```sh
php composer.phar install
```

* Create a MariaDB database and user, set them in the .env file:
```yaml
DATABASE_URL=mysql://sf_api_user:PassworD@localhost:3306/sf_api
```

* Generate a new OAUTH2_ENCRYPTION_KEY in the .env file. The existing one should be fine for testing purposes
```yaml
OAUTH2_ENCRYPTION_KEY=mOvuHLezmMIEI/PvKlA1DSNlSAsQ3gAy00ZTLW5QhNU=
```

* Generate new private and public keys. The existing one should be fine for testing purposes
```yaml
config/keys/private.key
config/keys/public.key
```

* Adjust the absolute path to the keys in the OAuth2 config file:
```yaml
config/packages/trikoder_oauth2.yaml
```

* Create database schemas using doctrine migrations
```sh
doctrine:schema:update --force
```

* (Optional) Run the server (if you don't have one already running)
```sh
# start the build in server
php bin/console server:start 192.168.0.3:8000

# stop server
php bin/console server:stop
```

* Create OAuth2 user
  Most common grant type is "client_credentials" - more information on this: https://oauth2.thephpleague.com/authorization-server/which-grant/
```sh
php bin/console trikoder:oauth2:create-client testuser testpassword --grant-type=client_credentials

php bin/console trikoder:oauth2:list-clients
```

* Configure routes
  There is one route already configured in the project - for testing purposes: /api
```sh
  $ php bin/console debug:route
 ---------------------------------- -------- -------- ------ -----------------------------------
  Name                               Method   Scheme   Host   Path
 ---------------------------------- -------- -------- ------ -----------------------------------
  api_app_api_products_getproducts   GET      ANY      ANY    /api/products
  oauth2_authorize                   GET      ANY      ANY    /authorize
  oauth2_token                       POST     ANY      ANY    /token
  index                              ANY      ANY      ANY    /
 ---------------------------------- -------- -------- ------ -----------------------------------
```

* Configure scopes

  Currently, there are no scopes defined. Read more on this here:
  
  https://github.com/trikoder/oauth2-bundle/blob/v3.x/docs/basic-setup.md#restricting-routes-by-scope
  
  https://github.com/trikoder/oauth2-bundle/blob/v3.x/docs/controlling-token-scopes.md

* Test it with Postman or curl
  For testing you can use either Postman (https://www.postman.com/downloads/) or the command line. There is a configured postman test collection in the project: postman_restapi_testcalls.json. You can import it and test it (eventually, adjust ip and port).
  
  First, you need to get a token using the credentials for your user created in the previous step - "Token" request in postman.
  
  Then, you can use the API with the token you just got - "Get Products" request in postman

  In Postman:
  
  
  
