# WebalizerReader
This is simple tool written with **PHP** to Read the Webalizer logs , such as Webalizer access logs and Webalizer FTP  logs .

in every Linux server that uses Cpanel there's Webalizer available for the users on that server , if the user is using the Webalizer service, then we can access the Webalizer folders that exist inside the tmp folder of the user from any other user on the server with any permissions , so we can consider this as a bug because the Webalizer logs contains very important information and FTP users , it might lead to a big breach sometimes you can find compressed backups that logged inside the Webalizer logs.

So the Webalizer folders are exist in the tmp folder of every user that uses webalizer..

> /home/user/tmp/*

so you will find two folders **webalizer** and **webalizerftp**.

This two folders contains all information we need and the hacker can find this info too useful for his hack to move inside the server or to reach his targeted website inside the server.


The tool is just a shortcut to read the webalizer for all users inside the server.

------------


**
*This tool for Educational purpose only , to help the people who willing to make a bigger projects.***

[![webalizerreader](https://raw.githubusercontent.com/Alaa-abdulridha/WebalizerReader/master/webalizer.png "webalizerreader")](https://raw.githubusercontent.com/Alaa-abdulridha/WebalizerReader/master/webalizer.png "webalizerreader")
