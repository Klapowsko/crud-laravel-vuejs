<h1 align="center">Bem Vindo ao Crud Laravel + Vuejs 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-blue.svg?cacheSeconds=2592000" />
  <a href="#" target="_blank">
    <img alt="License: ISC" src="https://img.shields.io/badge/License-ISC-yellow.svg" />
  </a>
</p>

> Esse é um projeto simples, utilizando laravel 8 junto com o vuejs ! 

## Install
Configurar os acessos ao banco
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sell2brazil
DB_USERNAME=root
DB_PASSWORD=root
```
Rodar a migração do banco
```sh
php artisan migrate
```
Rodar os seeders
```sh
php artisan db:seed --class=UsuariosSeeder
```
Instalar as dependecias
```sh
npm install
```

## Usage

```sh
php artisan serve --port=8000
```

[Acessar localhost](http://localhost:8000/)

## Author

👤 **Hiago Klapowsko**

* Website: Klapowsko
* Github: [@Klapowsko](https://github.com/Klapowsko)
* LinkedIn: [@Hiago Klapowsko](https://linkedin.com/in/Hiago-Klapowsko)

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
