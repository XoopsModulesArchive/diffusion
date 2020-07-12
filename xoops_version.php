<?php
// $Id: xoops_version.php,v 1.3 2005/03/14 20:05:43 jsaucier Exp $
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


// Global information
$modversion['name'] = _MI_DIFFUSION_NAME;
$modversion['version'] = 1.1;
$modversion['description'] = _MI_DIFFUSION_DESC;
$modversion['author'] = "Jeff Saucier";
$modversion['credits'] = "http://www.infostrategique.com";
$modversion['help'] = "docs/README";
$modversion['license'] = "GPL voir gpl.txt";
$modversion['official'] = 1;
$modversion['image'] = "images/diffusion_slogo.png";
$modversion['dirname'] = "diffusion";


// Menu
$modversion['hasMain'] = 1;


// Templates
$modversion['templates'][1]['file'] = 'diffusion_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'diffusion_senddiffusion.html';
$modversion['templates'][2]['description'] = '';

?>
