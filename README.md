# Wordpress Version Control

## Getting Started

`docker-compose up -d && docker-compose logs -f wordpress`

 - http://localhost:8080/wp-admin/
 - http://localhost:22222/

Credentials for wordpress admin and phpmyadmin are root // root

## Extra docker-machine Steps

If using docker-machine you'll probably need to forward ports:

`VBoxManage controlvm default natpf1 "tcp8080,tcp,127.0.0.1,8080,,8080"`

`VBoxManage controlvm default natpf1 "tcp22222,tcp,127.0.0.1,22222,,22222"`

## Setting up PHP dependencies

- `brew tap homebrew/homebrew-php`
- `brew install homebrew/php/composer`
- `composer install`