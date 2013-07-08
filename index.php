<?php
require 'blocks/auth.php';

include('blocks/connect.php');
$repo = $client->api('repo')->show('yiisoft', 'yii');
$contributors = $client->api('repo')->contributors('yiisoft', 'yii');
?>
<!DOCTYPE html>
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
                <div style='float: left;' ><h3 style="margin-left: 5px;"> GitHub Browser >><a href='index.php'> Main</a></h3></div>
                <div id="search_form">
                    <?php require_once 'blocks/form.php'; ?>
                </div>
            </div>
            <div id="content">
                <div id="repo_info">
                    <div align="center" id="rep">
                        <h2> <?php echo $repo['full_name']; ?></h2>
                        <table id='index_table'>
                            <tr>
                                <td>  Description :</td><td><?php echo $repo['description']; ?></td>
                            </tr>
                            <tr>
                                <td> Watchers :</td> <td><?php echo $repo['watchers']; ?></td>
                            </tr>
                            <tr>
                                <td>Forks :</td><td><?php echo $repo['forks']; ?></td>
                            </tr>
                            <tr>
                                <td>Open Issues : </td><td><?php echo $repo['open_issues']; ?></td>
                            </tr>
                            <tr>
                                <td>Homepage :</td><td><a id="href" href=" <?php echo $repo['homepage']; ?>" target="blank"><?php echo $repo['homepage']; ?>  </a></td>
                            </tr>
                            <tr>
                                <td>GitHub repo :</td><td><a href="<?php echo $repo [organization] ['repos_url']; ?>" target="blank"><?php echo $repo [organization] ['repos_url']; ?></a></td>
                            </tr>
                            <tr>
                                <td>Created at :</td> <td><?php echo $repo['created_at']; ?></td>
                            </tr>
                        </table>       
                    </div>
                </div>
                <div id="contributors">
                    <div align="center" id="rep">
                        <h2>Contributors : </h2>
                        <table id='index_table' >
                            <?php
                            $a = count($contributors);
                            for ($i = 0; $i < $a; $i++) {
                                if ($i < 7) {
                                    $id = $contributors[$i][id];
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
                                   echo "<tr>
                                <div id='nam'><td  align='center'  width='35%'><a    href='user_info.php?user=" . $contributors[$i][login] . "' >" . $contributors[$i][login] . "</a></div>
                               <div class='section' >
                        <div class='vote_up right' id='" . $contributors[$i][id] . "'>
                            <span class='yes_value'>" . $up . "</span>
                                <img style='cursor: pointer;' src='img/vote_up.png' alt='vote_up' class='vote_up_image'>
                          
                            </div>
                           <div class='vote_down left' id='" . $contributors[$i][id] . "'>
                            <span class='no_value'>" . $down . "</span> 
                                <img style='cursor: pointer;' src='img/vote_down.png' alt='vote_down' class='vote_down_image'>
                           
                            </div>
                            </div>
                                </td>
                            </tr>";
                                
                                }
                            }
                            ?>
                        </table>      
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
