<?php


define('IN_ECS', true);
include('../../data/config.php');
define('ROOT_PATH', str_replace(ADMIN_PATH . '/ad/ad1.php', '', str_replace('\\', '/', __FILE__)));

include(ROOT_PATH.'/includes/cls_ecshop.php');
include(ROOT_PATH.'/includes/cls_mysql.php');
$ecs = new ECS($db_name, $prefix);
$db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);

$update=1; //是否要强制更新，1为强制更新，0不更新

$act=$_REQUEST['act'];


        $val=$_FILES['Filedata']['name'];
        $val=str_replace(  '.'.end(explode(".", $_FILES['Filedata']["name"])),'',$_FILES['Filedata']["name"]);
        $tem=FSubstr($val,0,3);
        if($tem=='文字_')
        {
            $type='word';
        }
        elseif($tem=='代码_')
        {
            $type='code';
        }
        else
        {
            $type='image';
        }

       $tem=FSubstr($val,0,12);
       if($type!='image')
       {
           preg_match('/_(.*?)_/',$tem,$a);
           if(empty($a[1]))
           {
               if($type=='word')
               {
                   $val=str_replace('文字_','',$tem);
               }
               else
               {
                   $val=str_replace('代码_','',$tem);
               }
           }
           else
           {
                $val=$a[1];
           }
       }


        $sql="SELECT count(`position_id`) as c,  `ad_id` FROM  ".$ecs->table('ad'). " WHERE `ad_name`='$val'";
        $a_result=$db->getRow($sql);

        $sql="SELECT count(`position_name`) as c,position_id FROM  ".$ecs->table('ad_position'). " WHERE `position_name`='$val'";
        $p_result=$db->getRow($sql);

        if($a_result['ad_id'])
        {
            //$error_message.=$val.",广告列表已经存在";
            if(empty($update))
            {
               header('HTTP/1.1 303 Not Found');
               header("status: 303 Not Found"); 
               exit;
            }
        }
        
        if($p_result['c']>0)
        {
            //$error_message.=$val.",广告位置已经存在";
            if(empty($update))
            {
               header('HTTP/1.1 303 Not Found');
               header("status: 303 Not Found"); 
               exit;
            }
        }



         $position_name=$val;
         $position_desc=$val;

         $position_style='{foreach from=$ads item=ad}{$ad}{/foreach}';
         $file=getimagesize($_FILES['Filedata']["tmp_name"]);
         //var_dump($file);
         if(!empty($file['0']))
         {
             $ad_width=$file['0'];
         }
         else
         {
             $ad_width=100;
             //$error_message.=$val.",图片宽度不知";
         }
         if(!empty($file['1']))
         {
             $ad_height=$file['1'];
         }
         else
         {
             $ad_height=100;
             //$error_message.=$val.",图片宽度不知";
         }

         if($update && $p_result['c']>0)
         {
             $position_id=$p_result['position_id'];
             $sql_p_update="UPDATE ".$ecs->table('ad_position'). " SET `ad_height`='$ad_height',`ad_width`='$ad_width'  WHERE `position_id`='$position_id' ";
         }
         else
         {
             $sql_ad_insert = 'INSERT INTO '.$ecs->table('ad_position').' (position_name, ad_width, ad_height, position_desc, position_style) '.
            "VALUES ('$position_name', '$ad_width', '$ad_height', '$position_desc', '$position_style')";
         }

        $ad_link='http://ec68.com';
        $start_time=time()-100000;
        $end_time =time()+300000000;
        if($type=='image')
        {
            $filename=time().'.'.end(explode(".", $_FILES['Filedata']["name"]));
            $ad_code=$filename;
            if(is_uploaded_file($_FILES['Filedata']["tmp_name"]) && move_uploaded_file($_FILES['Filedata']["tmp_name"],ROOT_PATH .'/data/afficheimg/'.$filename))
            {
                 if($p_result['c']>0 && $update)
                 {
                     $db->query($sql_p_update);
                     $position_id=$p_result['position_id'];
                    // var_dump($sql_p_update);
                 }
                 else
                 {
                     $db->query($sql_ad_insert);
                     $position_id=$db->insert_id();
                 }
            }
            else
            {
                   header('HTTP/1.1 333 Not Found');
                   header("status: 333 Not Found"); 
                   exit;
            }

            if($a_result['c']>0 && $update)
            {
                $ad_id=$a_result['ad_id'];
                $sql="UPDATE ".$ecs->table('ad')." SET `position_id`='$position_id',`ad_code`='$ad_code',`media_type`='0'  WHERE `ad_id`='$ad_id'";
               // var_dump($sql);
                $db->query($sql);

            }
            else
            {
                $sql = "INSERT INTO ".$ecs->table('ad'). " (position_id,media_type,ad_name,ad_link,ad_code,start_time,end_time,link_man,link_email,link_phone,click_count,enabled)
                   VALUES ('$position_id',
                    '0',
                    '$val',
                    '$ad_link',
                    '$ad_code',
                    '$start_time',
                    '$end_time',
                    '',
                    '',
                    '',
                    '0',
                    '1')";
                    //echo $sql;
                 $db->query($sql);
            }
        }
        else
        {
            if($type=='word')
            {
                $media_type=3;
            }
            else
            {
                $media_type=2;
            }
            $ad_code=str_replace(  '.'.end(explode(".", $_FILES['Filedata']["name"])),'',$_FILES['Filedata']["name"]);
             if($p_result['c']>0 && $update)
             {
                 $db->query($sql_p_update);
                 $position_id=$p_result['position_id'];
                // var_dump($sql_p_update);
             }
             else
             {
                 $db->query($sql_ad_insert);
                 $position_id=$db->insert_id();
             }

            if($a_result['c']>0 && $update)
            {
                $ad_id=$a_result['ad_id'];
                $sql="UPDATE ".$ecs->table('ad')." SET `position_id`='$position_id',`ad_code`='$ad_code',`media_type`='$media_type'  WHERE `ad_id`='$ad_id'";
               // var_dump($sql);
                $db->query($sql);
            }
            else
            {
                $sql = "INSERT INTO ".$ecs->table('ad'). " (position_id,media_type,ad_name,ad_link,ad_code,start_time,end_time,link_man,link_email,link_phone,click_count,enabled)
                   VALUES ('$position_id',
                    '$media_type',
                    '$val',
                    '$ad_link',
                    '$ad_code',
                    '$start_time',
                    '$end_time',
                    '',
                    '',
                    '',
                    '0',
                    '1')";
                    //echo $sql;
                 $db->query($sql);
            }

        }







function FSubstr($title,$start,$len="",$magic=true)
{
  /**
  *  powered by Smartpig
  *  mailto:d.einstein@263.net
  */

 if($len == "") $len=strlen($title);
 
 if($start != 0)
 {
  $startv = ord(substr($title,$start,1));
  if($startv >= 128)
  {
   if($startv < 192)
   {
    for($i=$start-1;$i>0;$i--)
    {
     $tempv = ord(substr($title,$i,1));
     if($tempv >= 192) break;
    }
    $start = $i;
   }
  }
 }
 
 if(strlen($title)<=$len) return substr($title,$start,$len);
 
 $alen   = 0;
 $blen = 0;
 
 $realnum = 0;
 
 for($i=$start;$i<strlen($title);$i++)
 {
  $ctype = 0;
  $cstep = 0;
 
  $cur = substr($title,$i,1);
  if($cur == "&")
  {
   if(substr($title,$i,4) == "&lt;")
   {
    $cstep = 4;
    $length += 4;
    $i += 3;
    $realnum ++;
    if($magic)
    {
     $alen ++;
    }
   }
   else if(substr($title,$i,4) == "&gt;")
   {
    $cstep = 4;
    $length += 4;
    $i += 3;
    $realnum ++;
    if($magic)
    {
     $alen ++;
    }
   }
   else if(substr($title,$i,5) == "&amp;")
   {
    $cstep = 5;
    $length += 5;
    $i += 4;
    $realnum ++;
    if($magic)
    {
     $alen ++;
    }
   }
   else if(substr($title,$i,6) == "&quot;")
   {
    $cstep = 6;
    $length += 6;
    $i += 5;
    $realnum ++;
    if($magic)
    {
     $alen ++;
    }
   }
   else if(preg_match("/&#(\d+);?/i",substr($title,$i,8),$match))
   {
    $cstep = strlen($match[0]);
    $length += strlen($match[0]);
    $i += strlen($match[0])-1;
    $realnum ++;
    if($magic)
    {
     $blen ++;
     $ctype = 1;
    }
   }
  }else{
   if(ord($cur)>=252)
   {
    $cstep = 6;
    $length += 6;
    $i += 5;
    $realnum ++;
    if($magic)
    {
     $blen ++;
     $ctype = 1;
    }
   }elseif(ord($cur)>=248){
    $cstep = 5;
    $length += 5;
    $i += 4;
    $realnum ++;
    if($magic)
    {
     $ctype = 1;
     $blen ++;
    }
   }elseif(ord($cur)>=240){
    $cstep = 4;
    $length += 4;
    $i += 3;
    $realnum ++;
    if($magic)
    {
     $blen ++;
     $ctype = 1;
    }
   }elseif(ord($cur)>=224){
    $cstep = 3;
    $length += 3;
    $i += 2;
    $realnum ++;
    if($magic)
    {
     $ctype = 1;
     $blen ++;
    }
   }elseif(ord($cur)>=192){
    $cstep = 2;
    $length += 2;
    $i += 1;
    $realnum ++;
    if($magic)
    {
     $blen ++;
     $ctype = 1;
    }
   }elseif(ord($cur)>=128){
    $length += 1;
   }else{
    $cstep = 1;
    $length +=1;
    $realnum ++;
    if($magic)
    {
     if(ord($cur) >= 65 && ord($cur) <= 90)
     {
      $blen++;
     }else{
      $alen++;
     }
    }
   }
  }
 
  if($magic)
  {
   if(($blen*2+$alen) == ($len*2)) break;
   if(($blen*2+$alen) == ($len*2+1))
   {
    if($ctype == 1)
    {
     $length -= $cstep;
     break;
    }else{
     break;
    }
   }
  }else{
   if($realnum == $len) break;
  }
 }
 
 unset($cur);
 unset($alen);
 unset($blen);
 unset($realnum);
 unset($ctype);
 unset($cstep);
 
 return substr($title,$start,$length);
}








?>