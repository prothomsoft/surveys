<?php
class Counter {

   function __construct() {}
    
    function counter($t1=300,$t2=3600,$f="counter.tmp"){
        global $HTTP_COOKIE_VARS; 
        $a=getenv("REMOTE_ADDR");
        $t=time();
        $p=fopen($f,"a+");
        flock($p,2);
        $h=array_pad(explode("|",chop(fgets($p,100))),4,0);
        while(!feof($p)){
            $e=explode("|",$m=chop(fgets($p,100)));
            if($e[1]>$t&&$e[0]!=$a)$b[]=$m;
        }        
        $b[]=$a."|".($t+$t1);
        $h[0]=count($b);
        if(!$HTTP_COOKIE_VARS["lastvisit"]){
            $h[1]++;
            $h[2]++;
            if($h[3]!=($d=date("d"))){
                $h[2]=1;
                $h[3]=$d;
            }
        }
        setcookie("lastvisit",1,$t+$t2);
        ftruncate($p,0);
        fputs($p,join("|",$h)."\n".join("\n",$b));
        flock($p,3);
        fclose($p);
        return array($h[1],$h[2],$h[0]);
    }

}
?>