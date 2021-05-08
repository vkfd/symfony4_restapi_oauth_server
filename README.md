# symfony4_restapi_oauth_server
REST API Server with Symfony 4.4 and OAuth2 

## Installation Instructions

* Clone the repository:
``
git clone git@github.com:vkfd/symfony4_restapi_oauth_server.git
``


* Go to the directory (symfony4_restapi_oauth_server) and download Composer 2:
``
wget https://getcomposer.org/download/latest-2.x/composer.phar
``

* Install composer packages:
``
php composer.phar install
``

* Create a MariaDB database and user, set them in the .env file:
``
DATABASE_URL=mysql://sf_api_user:PassworD@localhost:3306/sf_api
``

* (Optional) Generate a new OAUTH2_ENCRYPTION_KEY in the .env file. The existing one should be fine for testing purposes
``
OAUTH2_ENCRYPTION_KEY=mOvuHLezmMIEI/PvKlA1DSNlSAsQ3gAy00ZTLW5QhNU=
``

* (Optional) Generate new private and public keys. The existing one should be fine for testing purposes
``config/keys/private.key`` and ``config/keys/public.key``

* Adjust the absolute path to the keys in the OAuth2 config file:
``
config/packages/trikoder_oauth2.yaml
``

* Create database schemas using doctrine migrations
``
``

* Run the server
``
``

* Create OAuth2 user
``
``

* Test it with Postman or curl
``
``
