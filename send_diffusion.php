<?php
// $Id: send_diffusion.php,v 1.5 2005/03/14 20:05:43 jsaucier Exp $
//  ------------------------------------------------------------------------ //
//                           Diffusion Center                                //
//            Copyright (c) 2004 Informatique Strategique IS                 //
//                  <http://www.infostrategique.com/>                        //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //


// Include the module header
include 'header.php';

    
// Set the template
$xoopsOption['template_main'] = 'diffusion_senddiffusion.html';    
    

// Include Xoops header
require(XOOPS_ROOT_PATH.'/header.php');


$myts =& MyTextSanitizer::getInstance();


// Get the user id
$uid = $xoopsUser->getVar("uid");


$error = 0;



// Get the subject
if (!empty($_POST['subject_diffusion'])) {
    $subject = $_POST['subject_diffusion'];
}
else {
    $error = 1;
    $xoopsTpl->assign('diffusion_error', _MD_DIFFUSION_ERROR_SUBJECT);
}



// Get the body
if (!empty($_POST['body_diffusion'])) {
    $body = $_POST['body_diffusion'];
}
else {
    $error = 1;
    $xoopsTpl->assign('diffusion_error', _MD_DIFFUSION_ERROR_BODY);
}



// Get the options
$options = $_POST['options_diffusion'];

// Set the right forum depending on the options type
if ( $options == "all" ) {
    $forum = $forum_all_id;
}
else {
    $forum = $forum_member_id;
}



if ( $error != 1) {
    
    // Put the files in the docmanager
    require_once '../docmanager/include/functions.php';
    
    $first = true;
    
    // Loop all the file
    for ($i = 1; $i < $number_of_file; $i++) {
    
        $insert_file = false;
        
        // Check if we have a file
        if (is_uploaded_file($_FILES['file_diffusion'.$i]['tmp_name'])) {
        
            // If it's the first time, add the message
            if ( $first == true ) {
                $body .= "\n\n\n";
                $body .= _MD_DIFFUSION_ATTACHED_FILES;
                $body .= "\n";
            }
            
            $first = false;
            
            
            // Set file info
            $file_name = $myts->addSlashes($_FILES['file_diffusion'.$i]['name']);
            $extension = strtolower(strrchr($file_name, "."));
            
            $parent_id = $folder_diffusion;
            $owner = $xoopsUser->uid();
            $create_date = time();
            $file_type = check_file_type($file_name);
            $file_space = ceil(($_FILES['file_diffusion'.$i]['size'] / 1000));
            
            
            
            // Select the config path
            $sql = "SELECT configs_path FROM ".$xoopsDB->prefix("docmanager_configs");
            $result = $xoopsDB->query($sql);
            $myconfig = $xoopsDB->fetchArray($result);        
    
            
            $current_dir = get_current_dir_path($parent_id);
        
            if ( is_writable($current_dir) && if_folder_exist($parent_id) ) {
            
                do {
            
                    $file_nameondisk = ereg_replace('[0-9]', null, md5(time())).rand().$extension;
                    $where_to_put_file = $current_dir.$file_nameondisk;

                    if ( !file_exists($where_to_put_file) ) {
                    
                        $sql = sprintf("INSERT INTO %s (files_id, files_name, files_nameondisk, files_type, files_space, files_createddate, files_modificationdate, files_owner, files_usermod, files_foldersid) VALUES (%u, '%s', '%s', '%s', %u, %u, %u, %u, %u, %u)", $xoopsDB->prefix("docmanager_files"), '', $file_name, $file_nameondisk, $file_type, $file_space, $create_date, $create_date, $owner, $owner, $parent_id);
                        
                        
                        // Validate and add the file
                        $where_to_put_file = get_current_dir_path($parent_id).$file_nameondisk;
                        
                        if ($where_to_put_file !== "/" && strpos($where_to_put_file, $myconfig['configs_path']) !== false && strpos($where_to_put_file, "..") !== true && strpos($where_to_put_file, " ") !== true) {
                            if ($result = $xoopsDB->query($sql)) {
                            
                                $new_file = $xoopsDB->getInsertId();
                                
                                // Move the file
                                move_uploaded_file($_FILES['file_diffusion'.$i]['tmp_name'], $where_to_put_file);
                                
                                // Add the link
                                $body .= "\n";
                                $body .= XOOPS_URL."/modules/docmanager/get_file.php?curent_dir=".$parent_id."&curent_file=".$new_file."";
                                
                                $insert_file = true;
                            }
                            else {
                                exit(1);
                            }
                        }
                        else {
                            exit(1);
                        }
                    }
                } while ($insert_file == false);
            }
            else {
                exit(1);
            }
        }
    }
    
    
    
    // Put the message in the forum for archive
    include_once '../newbb/class/class.forumposts.php';
    
    $forumpost = new ForumPosts();
    $forumpost->setForum($forum);
    $forumpost->setIp($_SERVER['REMOTE_ADDR']);
    $forumpost->setUid($uid);
    
    $subject = xoops_trim($subject);
    $forumpost->setSubject($subject);
    $forumpost->setText($body);
    $forumpost->setNohtml(1);
    $forumpost->setNosmiley(0);
    $forumpost->setIcon(0);
    $forumpost->setAttachsig(1);
    $forumpost->store();
    
    
    // Increment user post
    if (is_object($xoopsUser)) {
        $xoopsUser->incrementPost();
    }


    
    $body .= "\n\n\n";
    $body .= _MD_DIFFUSION_FOR_ANSWER."\n\n";
    $body .=  XOOPS_URL."/modules/newbb/viewtopic.php?topic_id=".$forumpost->topic()."&forum=".$forum."";
    
    


    // Send all the mail to the right user
    include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
    
    $xoopsMailer =& getMailer();
    $xoopsMailer->useMail(); 
    
    $xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/modules/diffusion/language/'.$xoopsConfig['language'].'/mail_template');
    $xoopsMailer->setTemplate("diffusion.tpl");
    
    
    $member_handler =& xoops_gethandler('member');
    
   
    $rusers = "";
    
    if ( $options == "all" ) {
        $userlist =& $member_handler->getUsers();        
        $count = count($userlist);
        
        for ($i = 0; $i < $count; $i++) {
            $rusers[] = $userlist[$i];
        }
    }
    else {
        $members =& $member_handler->getUsersByGroup(XOOPS_GROUP_USERS, true);
        
        foreach ($members as $member) {
            $rusers[] = $member;
        }    
    }
    
   
    $xoopsMailer->setToUsers($rusers);
    $xoopsMailer->setFromEmail("ne_pas_repondre@crisp.gouv.qc.ca");
    $xoopsMailer->setFromName("Extranet du CRISP"); 
    //JEFF
    //$xoopsMailer->setSender($xoopsUser->getVar("email", "E"));

    $xoopsMailer->setSubject($subject);
    
    $xoopsMailer->assign("MESSAGE", $body);

    
    if ( !$xoopsMailer->send() ) {
        $xoopsTpl->assign('diffusion_error', _MD_DIFFUSION_SENT_ERROR);
        $error = 1;
    }
    else {
        $xoopsTpl->assign('diffusion_sent', _MD_DIFFUSION_SENT);
    }
}



// Set last option
$xoopsTpl->assign('diffusion_main_title', _MD_DIFFUSION_MAIN_TITLE);
$xoopsTpl->assign('diffusion_is_error', $error);



// Include Xoops footer
include 'footer.php';

?>
