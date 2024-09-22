# CloudDataService
this is a high performance data storage service. use php to run. its data storage need mysql.
cloud data service -- Readme
    contents-
        1.How to use it
        2.About us
    -------------------
    1. How to use it
        1. ready
            it need php, apache/nginx, mysql, linux/windows
            in your console, Enter the following command to install。
                [root@localhost / ]# cd /var/www/html
                [root@localhost html ]# git clone https://github.com/xiaojian-177/CloudDataService/
                xxxxxxxxxxxxxxxxxxxxxxxxxx Done!
                xxxxxxxxxxxxxxxxxxxxxxxxxx Done!
                xxxxxxxxxxxxxxxxxxxxxxxxxx
                xxxxxxxxxxxxxxxxxxxxxxxxxx Done!
            If your server shows the above prompt, continue.
            in your console, enter "mysql"
            in you database, you must create a table.
                sql:
                    mysql>create table data(
                         >data_key varchar(255),
                         >data_value text,
                         >data_type int,
                         >tokenbelong varchar(255)
                         );
        2. parameter
            url:yourserver/api/api.php?method=add/set/del/query/queryall&token=your_create_token[&key=your_key][&value=your_value]
    2. About us
    It is open source. We are committed to building a good cloud storage system

                
    
