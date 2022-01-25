# chess2gether

Website which allows to organize or join existing chess event.
![Example](./public/img/logo.jpeg)
</br>
![Website](./public/img/image.png)

## Description
This website allows to join or create new chess events anywhere in the world. To join an event You can simply choose one from existing on the map. If you are an event organizer you can place your event in your desired place, and supplement all required informations about event.

## Built with

- HTML
- CSS
- Javascript
- PHP 7.4
- Docker
- Mapbox


## Getting started
Requirements:
- [Docker](https://www.docker.com/)
- Any text editor (for example [vsCode](https://www.docker.com/))

Get started with a project:
- Clone the repository
```
git clone https://github.com/pmarek2k/chess2gether
```
- Change working directory to cloned repo:
```
cd chess2gether
```
- Build your application:
``` 
docker-compose build
```
- Add config.js file to public/js with following code:
``` 
export const accessToken = 'YOUR_ACCESS_TOKEN';
```
To get your Mapbox access token login to [Mapbox](https://www.mapbox.com/) and create one.
- Run your application:
```angular2html
docker-compose up
```
