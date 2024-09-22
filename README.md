# CloudDataService
this is a high performance data storage service. use php to run. its data storage need mysql.<br>
cloud data service -- Readme<bR>
    contents-<br>
        1.How to use it<br>
        2.About us<br>
    -------------------<br>
    1. How to use it<br>
        1. ready<br>
            it need php, apache/nginx, mysql, linux/windows<br>
            in your console, Enter the following command to install.<br>
                [root@localhost / ]# cd /var/www/html<br>
                [root@localhost html ]# git clone https://github.com/xiaojian-177/CloudDataService/<br>
                xxxxxxxxxxxxxxxxxxxxxxxxxx Done!<br>
                xxxxxxxxxxxxxxxxxxxxxxxxxx Done!<br>
                xxxxxxxxxxxxxxxxxxxxxxxxxx<br>
                xxxxxxxxxxxxxxxxxxxxxxxxxx Done!<br>
            If your server shows the above prompt, continue.<br>
            in your console, enter "mysql"<br>
            in you database, you must create a table.<br>
                sql:<br>
                    mysql>create table data(<br>
                         >data_key varchar(255),<br>
                         >data_value text,<br>
                         >data_type int,<br>
                         >tokenbelong varchar(255)<br>
                         );<br>
        2. parameter<br>
            url:yourserver/api/api.php?method=add/set/del/query/queryall&token=your_create_token[&key=your_key][&value=your_value]<br>
    2. About us<br>
    It is open source. We are committed to building a good cloud storage system<br>

                
    
