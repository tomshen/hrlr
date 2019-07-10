HRLR
===

Development
-----------

## Wordpress Setup
1. Download and install [Docker](https://download.docker.com/mac/stable/Docker.dmg).
2. In a terminal:
```sh
docker swarm init
docker stack deploy -c stack.yml hrlr
```
3. Open [localhost:8080](http://localhost:8080) in a browser.

## Compiling Sass
1. Set up [Homebrew](https://brew.sh/).
2. In a terminal: `brew install sass/sass/sass`
3. To compile: `sass --watch -I hrlr/sass hrlr/sass/style.scss hrlr/style.css`
