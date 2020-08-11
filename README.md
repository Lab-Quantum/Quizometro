[Preview here](https://quizometro.netlify.app).

### Setup

Copy configuration files:

```
cp server/local.php.sample server/local.php
```

#### Setup with Docker

Install Docker and Docker Compose, below the links:

- https://docs.docker.com/install/
- https://docs.docker.com/compose/install/

Build project with Docker

```
docker-compose build
```

Start project

```
docker-compose up
```

Tip for starting the project

```
docker-compose up --build
```

#### Without Docker

Install
- PHP 7.4.3
- MySQL 8.0.1
- Node 12.18.3
- NPM 6.14.4

Install web

```
cd web
npm install 
```

Start web

```
npm start 
```