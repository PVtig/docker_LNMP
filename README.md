# lemp-docker

//запуск проекта
docker-compose up -d

// остановка 
docker stop $(docker ps -a -q)

//вход в контейнер бд 
docker exec -it <mysql-container-id> mariadb -p

//инспекция контейнера 
 docker inspect cb0c3809eb11 | grep -i IPAddress