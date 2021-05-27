<?php



function kml($data)
{
  
  
      printf("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
//    printf("<%s version=\"1.0\"  encoding=\"ISO-8859-1\" %s>\n","?xml","?");
    printf("<gpx creator='Navionics Boating App'
        xsi:schemaLocation='http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/11.xsd'
        xmlns='http://www.topografix.com/GPX/1/1'
        xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
        >");
    printf("  <metadata>
    <link href='sailserver.com'>
      <text>Sailserver</text>
    </link>
    <time>%s</time>
      </metadata>\n
      ",$data['start']);
      
      
      
    printf("<trk>");
    
    printf("<name>Sailserver track</name>
      <type>sailing</type>
      <trkseg>\n");
      
    $n=0;
    $div= count($data)/500; //max 500 points
    if ($div<1)
      $div=1;
    foreach($data as $i => $t) {
      if ($t['utc'] && $t['lat'] && $t['lon'] && $t['lat']>-90 && $t['lat']<90 && $t['lon']<180 && $t['lon']>-180) {
        if (!$n++ && !$live) {
if (0) {          
          printf("<wpt lat='%s' lon='%s'>",$t['lat'],$t['lon']);
          printf("<name>Start</name>");
          printf("</wpt>");
}          
        }
//        if (!($n%$div)) {
          printf("<trkpt lat='%s' lon='%s'>",$t['lat'],$t['lon']);
          printf("<time>%s</time>",gmdate("Y-m-d\TH:i:s\Z", $i));
//          printf("<time>%s</time>",$t['utc']);
          printf("<desc>Hello world</desc>",'123','1.1');
//          printf("<desc>COG:%s,SOG:%s</desc>",'123','1.1');
          printf("</trkpt>\n");
//        }
      }
//      if ($n>1000)          break;      
    };
if (0) {    
      printf("<wpt lat='%s' lon='%s'>",$t['lat'],$t['lon']);
      printf("<name>Stop</name>");
      printf("</wpt>\n");
}      
    printf("\n</trkseg>");
    printf("</trk>");
    printf("</gpx>");

}


?>