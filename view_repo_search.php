<?php

include('blocks/connect.php');
require 'blocks/auth.php';
$language = $_POST['lang'];
$search = $_POST['search'];
$repos = $client->api('repo')->find($search, array('language' => $language));

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MobiDev</title>
        <script type='text/javascript' src='js/jquery-1.8.1.js'></script>
        <script type='text/javascript' src='js/script.js'></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/style1.css">

    </head>
    <body>

        <div id="main">

            <div id="search">
                <div  style='float: left;'><h3 style="margin-left: 5px;">GitHub Browser >><a href='index.php'> Main</a>>> Search </h3></div>
                <div id="search_form">
                    <?php require_once 'blocks/form.php'; ?>
                </div>
            </div>

            <div id="content">
                <div align='center'>
                    <?php
                    if (!empty($repos[repositories])) {
                        echo "<span>
                       <h2>For search  term '" . $search . "' found :</h2> 
                   </span>";
                    } else {
                        echo "<h2>We couldn't find any repositories matching '" . $search . "'</h2>";
                    }
                   
                    ?>
                </div>
                <div  id="repo_list">
                    <?php
                    if (!empty($repos[repositories])) {
                        $a = count($repos[repositories]);
                        for ($i = 0; $i < $a; $i++) {
                            if ($i < 9) {
                                echo "  <table  width='100%' align='center'  CELLPADDING=10 ><tr>
                            <td width='30%'><h3><a href='repo_info.php?repo=" . $repos[repositories][$i][name] . "&owner=" . $repos[repositories][$i][owner] . "'>" . $repos[repositories][$i][name] . "</a></h3></td>
                                <td><a href='" . $repos[repositories][$i][homepage] . "' target='blank'>" . $repos[repositories][$i][homepage] . " </a></td><td width='20%'><a href='user_info?user=" . $repos[repositories][$i][owner] . "'>" . $repos[repositories][$i][owner] . "</a></td>
                        </tr>
                        <tr>
                            <td>" . $repos[repositories][$i][description] . "</td>
                        </tr>
                        <tr>
                            <td>watchers : " . $repos[repositories][$i][watchers] . "</td><td>forks : " . $repos[repositories][$i][forks] .  "</td><td></td>
                            
                         </tr>  </table><br>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>
