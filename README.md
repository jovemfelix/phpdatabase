## Deploy MYSQL
```sh
oc new-app mysql MYSQL_USER=user MYSQL_PASSWORD=pass MYSQL_DATABASE=testdb -l db=mysql
```



## Deploy php application and link with MYSQL

```
oc new-app https://github.com/jovemfelix/phpdatabase MYSQL_SERVICE_HOST=mysql MYSQL_USER=user MYSQL_PASSWORD=pass MYSQL_DATABASE=testdb -l app=phpdatabase
```



### Expose php app

```
oc expose svc phpdatabase
```



## Test MYSQL

```bash
mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} -h ${MYSQL_SERVICE_HOST} -P ${MYSQL_SERVICE_PORT} ${MYSQL_DATABASE} 
```

```mysql
show tables
```

```mysql
CREATE TABLE IF NOT EXISTS tasks (
    task_id INT AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    due_date DATE,
    status TINYINT NOT NULL,
    priority TINYINT NOT NULL,
    description TEXT,
    PRIMARY KEY (task_id)
)  ENGINE=INNODB;
```



## Reference

- <http://www.mysqltutorial.org/mysql-create-table/>
- <https://github.com/debianmaster/openshift-examples/tree/master/php-mysql-example>