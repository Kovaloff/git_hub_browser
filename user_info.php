<?php
$username = trim($_GET[user]);
require 'blocks/auth.php';
include('blocks/connect.php');
$user = $client->api('user')->show($username);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php include_once 'blocks/jquery_connect.php'; ?>
        <title>MobiDev</title>
        <script type='text/javascript' src='js/jquery-1.8.1.js'></script>
        <script type='text/javascript' src='js/script.js'></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/style1.css">
    </head>
    <body>
        <div id="main">
            <div id="search">
                <div  style='float: left;'><h3 style="margin-left: 5px;">GitHub Browser >><a href='index.php'> Main</a> >>User Info</h3></div>
                <div id="search_form">
                    <?php require_once 'blocks/form.php'; ?>
                </div>
            </div>
            <div id="content">
                <div align='center'>
                </div>
                <div  id="user">
                    <?php
                    $id = $user[id];
                    $result = mysql_query("SELECT vote_up, vote_down FROM votes WHERE user_id=$id");

                    if (!$result) {
                        die('Неверный запрос: ' . mysql_error());
                    }
                    while ($row = mysql_fetch_array($result)) {
                        $item[] = $row;
                    }
                    $up;
                    $down;

                    if (mysql_num_rows($result) == 0) {
                        $up = 0;
                        $down = 0;
                    } else {
                        $up = $item[0]['vote_up'];
                        $down = $item[0]['vote_down'];
                    }
                    unset($item);

                    echo "  <table id='index_table'  width='100%'  align='center'  CELLPADDING=10 >
                        <tr>
                            <td width='17%'  ><h2>" . $user[name] . "</h2></td>
        
                                <td width='5%' ROWSPAN='4'><img width='100%'  src='" . $user[avatar_url] . "'></a></td>
                        </tr>
                        <tr>
                            <td>Login : " . $user[login] . "</td>
                        </tr>
                        <tr>
                            <td>Company: " . $user[company] . "</td>
                         </tr>  
                         <tr>
                            <td>Blog : <a href='" . $user[blog] . "' target='blank'>" . $user[blog] . "</a></td>
                         </tr>  
                        <tr>
                            <td>Followers : " . $user[followers] . "</td>
                                <td  align='center' width='12%' ><div id='nam'><a    href='user_info.php?user=" . $contributors[$i][login] . "' >" . $user[login] . "</a></div>
                            <div class='section' >
                        <div class='vote_up right' id='" . $user[id] . "'>
                            <span class='yes_value'>" . $up . "</span>
                            <img style='cursor: pointer;' src='img/vote_up.png' alt='vote_up' class='vote_up_image'>
                        </div>
                        <div class='vote_down left' id='" . $user[id] . "'>
                            <span class='no_value'>" . $down . "</span> 
                            <img style='cursor: pointer;' src='img/vote_down.png' alt='vote_down' class='vote_down_image'>
                        </div>
                    </div> </td>
                         </tr> 
                </table>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
