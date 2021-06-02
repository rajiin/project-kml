<?php

// google maps does not support HTML tags in description fields
// google earth supports more tags
// pictures are copied to the users drive account

function kml($tracks)
{
$data=$tracks[0]['points'];

printf("<?xml version='1.0' encoding='UTF-8'?>");
printf("<kml xmlns='http://www.opengis.net/kml/2.2' xmlns:gx='http://www.google.com/kml/ext/2.2' xmlns:atom='http://www.w3.org/2005/Atom'>\n");

printf("<Document>\n");
printf("<name>Sailserver Project Name</name>");
printf("<description>Sailserver Project Desciption</desription>");

// Style definitions
printf("<LineStyle id='blueLine-01'>");
    printf("<color>ffd18802</color>");
    printf("<colorMode>normal</colorMode>");
    printf("<width>5</width>");
printf("</LineStyle>");

// create map layer for path
    printf("<Folder>\n");
    printf("<name>Sailserver Track ");
        printf("%s",$data['trackid']);
    printf("</name>\n");

// create layer for the track path
    printf("<Placemark>\n");
    printf("<name>Track</name>\n");
    printf("<styleURL>#blueLine-01</styleURL>");
    printf("<LineString>");
//        printf("<extrude>1</extrude>");
        printf("<tessellate>1</tessellate>");

// create all ponts in the track path
    printf("<coordinates>\n");

foreach($data as $i => $t) {
              printf("%s,%s,0\n",$t['lon'],$t['lat']);
}
    printf("</coordinates>\n");
    printf("</LineString>");
    printf("</Placemark>\n");
//    printf("</Folder>\n");
// end creating path layer

// create layer for all track points
//    printf("<Folder>\n");
 // layer name for all track points 
//    printf("<name>Points</name>\n");

foreach($data as $i => $t) {
    printf("<Placemark>\n");
    // name for the individual track points
        printf("<name>");
            printf("%s",$t['utc']);
        printf("</name>");

        printf("<description>");
            printf("<![CDATA[");
            foreach($t as $j => $k) {
                printf("<b>%s:</b> %s<br>",$j,$k);
            }

            printf("]]>");
        printf("</description>\n");
            
        printf("<Point>\n");
            printf("<coordinates>");
            printf("%s,%s,0",$t['lon'],$t['lat']);
            printf("</coordinates>\n");
        printf("</Point>\n");
    printf("</Placemark>\n");
}
// above repeats for all track points   
    
        printf("</Folder>\n");
    printf("</Document>\n");
printf("</kml>\n");

}

?>