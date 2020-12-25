FROM mysql:5.7
ENV MYSQL_ROOT_PASSWORD="12345678"
ADD ./db.sql /docker-entrypoint-initdb.d
RUN echo "[mysqld]" >>  /etc/mysql/my.cnf 
RUN echo "sql-mode='NO_ENGINE_SUBSTITUTION'" >>  /etc/mysql/my.cnf 
RUN service mysql restart
EXPOSE 3306
