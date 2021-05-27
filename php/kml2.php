<?php

function kml($data)
{
printf("<kml xmlns='http://www.opengis.net/kml/2.2' xmlns:gx='http://www.google.com/kml/ext/2.2' xmlns:kml='http://www.opengis.net/kml/2.2' xmlns:atom='http://www.w3.org/2005/Atom'>\n");

    printf("<Document>\n");
    printf("<name>Sailserver Track</name>\n");
    printf("<Folder>\n");
        printf("<Placemark>\n");
        printf("<name>Track Point 1</name>\n");
            printf("<description>\n");
                printf("<![CDATA[<h1>Hello World!</h1>]]>\n");
            printf("</description>\n");
            printf("<Point>\n");
                printf("<coordinates>9.811324,54.92856</coordinates>\n");
            printf("</Point>\n");
        printf("</Placemark>\n");
    printf("</Folder>\n");
    printf("</Document>\n");
printf("</kml>\n");

}

?>