

<?php 
/*
Here's a simple, recursive, function to transform XML data into pseudo E4X syntax ie. root.child.value = foobar */
error_reporting(E_ALL); 

$xml = new SimpleXMLElement( 
'<Patriarch> 
   <name>Bill</name> 
   <wife> 
     <name>Vi</name> 
   </wife> 
   <son> 
     <name>Bill</name> 
   </son> 
   <daughter> 
     <name>Jeri</name> 
     <husband> 
       <name>Mark</name> 
     </husband> 
     <son> 
       <name>Greg</name> 
     </son> 
     <son> 
       <name>Tim</name> 
     </son>     
     <son> 
       <name>Mark</name> 
     </son>     
     <son> 
       <name>Josh</name> 
         <wife> 
           <name>Kristine</name> 
         </wife> 
         <son> 
           <name>Blake</name> 
         </son> 
         <daughter> 
           <name>Liah</name> 
         </daughter> 
     </son> 
   </daughter> 
</Patriarch>
'); 

RecurseXML($xml); 

function RecurseXML($xml,$parent="") 
{ 
   $child_count = 0; 
   foreach($xml as $key=>$value) 
   { 
      $child_count++;     
      if(RecurseXML($value,$parent.".".$key) == 0)  // no childern, aka "leaf node" 
      { 
         print($parent . "." . (string)$key . " = " . (string)$value . "<BR>\n");        
      }     
   } 
   return $child_count; 
} 

?> 