<?php
// $Id: index.php,v 1.2 2005/01/17 19:34:46 jsaucier Exp $
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
$xoopsOption['template_main'] = 'diffusion_index.html';


// Include Xoops header
require(XOOPS_ROOT_PATH.'/header.php');


// Take the group of the user
if ($xoopsUser) {
    $groups = $xoopsUser->getGroups();
}
else {
    $groups = XOOPS_GROUP_ANONYMOUS;
}


$xoopsTpl->assign('diffusion_main_title', _MD_DIFFUSION_MAIN_TITLE);
$xoopsTpl->assign('diffusion_subject', _MD_DIFFUSION_SUBJECT);
$xoopsTpl->assign('diffusion_options', _MD_DIFFUSION_OPTIONS);
$xoopsTpl->assign('diffusion_options_all', _MD_DIFFUSION_OPTIONS_ALL);


// Check if he is in the users group
//if ( in_array(XOOPS_GROUP_USERS, $groups) ) {
    $xoopsTpl->assign('diffusion_options_members', _MD_DIFFUSION_OPTIONS_MEMBERS);
//}
//else {
//    $xoopsTpl->assign('diffusion_options_members', '');
//}


$xoopsTpl->assign('diffusion_body', _MD_DIFFUSION_BODY);

$xoopsTpl->assign('diffusion_files', _MD_DIFFUSION_FILE);
$xoopsTpl->assign('diffusion_files_number', _MD_DIFFUSION_FILE_NUMBER);
$xoopsTpl->assign('diffusion_number_of_files', $number_of_file);

$xoopsTpl->assign('diffusion_warning', _MD_DIFFUSION_WARNING);
$xoopsTpl->assign('diffusion_submit', _MD_DIFFUSION_SUBMIT);


// Include Xoops footer
include 'footer.php';

?>
