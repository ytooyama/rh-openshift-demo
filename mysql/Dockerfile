FROM mysql:lts
COPY ./conf/ /etc/mysql/
COPY ./sql/ /docker-entrypoint-initdb.d/
RUN mkdir /etc/mysql/mysql.conf.d
EXPOSE 8889
ENV MYSQL_ROOT_PASSWORD=root
