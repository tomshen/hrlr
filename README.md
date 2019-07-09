HRLR
===

Development
-----------

## Wordpress Setup
1. Download and install [Docker](https://download.docker.com/mac/stable/Docker.dmg).
1. In a terminal:
```sh
docker swarm init
docker stack deploy -c stack.yml hrlr
```
1. Open [localhost:8080](http://localhost:8080) in a browser.

## Compiling Sass
1. Set up [Homebrew(https://brew.sh/).
1. In a terminal: `brew install sass/sass/sass`
1. To compile: `sass --watch -I hrlr/sass hrlr/sass/style.scss hrlr/style.css`
