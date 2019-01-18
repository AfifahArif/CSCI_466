/*
Programmer: Afifah Arif

Program: Assignment 12 - mysql in C++

Due Date: December 7, 2018
*/
#include <iostream>
#include <mysql.h>
#include <stdlib.h>
#include <stdio.h>

main()
{
   MYSQL *conn;
   MYSQL_RES *res;
   MYSQL_ROW row;
   int num_col;

   char *server = "courses";
   char *user = "XXXXXXXX";
   char *password = "XXXXXXXXX";
   char *database = "henrybooks";

   conn = mysql_init(NULL);

   if (!mysql_real_connect(conn, server, user, password,
	database, 0, NULL, 0)) //connect
	{
             fprintf(stderr, "%s\n", mysql_error(conn));
             exit(-1);
        }

   if (mysql_query(conn, "SELECT Title, Price FROM Book")) //sql query
        {
             fprintf(stderr, "%s\n", mysql_error(conn));
             exit(-1);
        }
   res = mysql_use_result(conn);

   printf("Books:\n"); //output table
   while ((row = mysql_fetch_row(res)) != NULL)
      printf("%s %s \n", row[0], row[1]);

   //2nd
   if (mysql_query(conn, "SELECT AuthorFirst, AuthorLast FROM Author")) //sql query
        {
             fprintf(stderr, "%s\n", mysql_error(conn));
             exit(-1);
        }

   res = mysql_use_result(conn);

   printf("Authors:\n"); //output table
   while ((row = mysql_fetch_row(res)) != NULL)
      printf("%s %s \n", row[0], row[1]);

   mysql_free_result(res);
   mysql_close(conn);
}
