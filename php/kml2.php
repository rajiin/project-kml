<?php

function kml($data)
{
printf("<?xml version='1.0' encoding='UTF-8'?>");
printf("<kml xmlns='http://www.opengis.net/kml/2.2' xmlns:gx='http://www.google.com/kml/ext/2.2' xmlns:atom='http://www.w3.org/2005/Atom'>\n");

    printf("<Document>\n");

// create map for layers
    printf("<Folder>\n");
    printf("<name>Sailserver Track</name>\n");

// create layer for the track path
    printf("<Placemark>\n");
    printf("<name>Track</name>\n");
// select line style for the path (not defined yet)
    printf("<styleUrl>#line-59ACFF-6000-nodesc</styleUrl>\n");
    printf("<LineString>\n");
    printf("<tessellate>1</tessellate>\n");

// create all ponts in the track path
    printf("<coordinates>\n");

// all points from the track goes here to draw the path

    printf("</coordinates>\n");
    printf("</LineString>\n");
    printf("</Placemark>\n");
    printf("</Folder>\n");
// end creating map and path layer

// create layer for all track points
    printf("<Folder>\n");
 // layer name for all track points 
    printf("<name>Points</name>");
        printf("<Placemark>\n");
// name for the individual track points
        printf("<name>Point 1</name>\n");
            printf("<description>");
                printf("<![CDATA[<b>Hello</b> World!]]>");
            printf("</description>\n");
            printf("<Point>\n");
                printf("<coordinates>9.811324,54.92856</coordinates>\n");
            printf("</Point>\n");
        printf("</Placemark>\n");
 // above repeats for all track points   
    
        printf("</Folder>\n");
    printf("</Document>\n");
printf("</kml>\n");

}

?>