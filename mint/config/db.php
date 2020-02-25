<?php
/******************************************************************************
 Mint
  
 Copyright 2004-2011 Shaun Inman. This code cannot be redistributed without
 permission from http://www.shauninman.com/
 
 More info at: http://www.haveamint.com/
 
 ******************************************************************************
 Configuration
 ******************************************************************************/
 if (!defined('MINT')) { header('Location:/'); } // Prevent viewing this file 

$Mint = new Mint (array
(
        'server'        => '10.28.79.101',
        'username'      => 'wordpress',
        'password'      => 'T7pDdHXBPz2D',
        'database'      => 'wordpress',
        'tblPrefix'     => 'mint_'
));