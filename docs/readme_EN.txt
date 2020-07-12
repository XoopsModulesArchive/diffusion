
Documentation for the diffusion module Version 1.1.0 (require
docmanager module Version 1.1.0)

Jeff Saucier

   <jsaucier _AT_ infostrategique _DOT_ com>
     _________________________________________________________

   Table of Contents
   ChangeLog
   Informations
   Installation

        Requirements
        Module installation
     _________________________________________________________

ChangeLog

   I recommend to update to this new version. Just overwrite the old
   files with the new one (pay attention to "include/configs.php" !!)

   Here is what change since the last version :

     * Now require and use docmanager Version 1.1.0
     * Bugs correction
     _________________________________________________________

Informations

   This module allow you to send email with files to the users of your
   site. This module is not very usable "as is" because it is very tied
   to the CRISP's extranet. But, you can adapt it easily for your
   needs.

   This is what the module provide :

     * Sending email to peoples of the Members group or all users
     * Send a copy in the forums for archive to allow discussion
     * Put the attached files in the document center for allowing
       peoples that receive the email to download the files

   This  module has been developped for the CRISP extranet and is
   released with the GPL license.
     _________________________________________________________

Installation

Requirements

   This module has been tested with the following configurations. It
   may work on other plateforme and configurations :

     * NOTE : This module is not very usable "as is" because it is very
       tied to the CRISP's extranet. But, you can adapt it easily for
       your needs.
     * NOTE  : This module depend of our other module, docmanager
       Version 1.1.0. You must have it in order to make this one work.
     * Xoops 2.0.7.x and 2.0.9.x
     * Linux and Apache
     _________________________________________________________

Module installation

   To install this module, first untar or unzip it. It will create a
   folder named "diffusion".

   Copy this folder to the Xoops modules folder and activate the new
   module from the administration page.

   Now, you must create a folder in the docmanager module. I recommend
   to create it on the Root folder and hide it so nobody will see it
   except admin. Adjust the permissions for every group to access it
   (they can't access the folder directly because it's hidden but can
   access file in it with a link)

   After you have created the hidden folder, note the folder id and put
   it in include/configs.php in the diffusion module.

   The next step is to create to forum categories, one for member users
   and  one  for  all  users.  Put  the  respective  forums id in
   include/configs.php.

   In include/configs.php, you can also specify the maximum number of
   files you want when sending an email.
