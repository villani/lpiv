<?php
if (isset($_COOKIE['login'])) {
    header('LOCATION: autentica.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Login</th>
                <th>Senha</th>
            </tr>
            <tr>
                <td><a href="grava-cookie.php?login=dilma&senha=123">
                    Dilma</a></td>
                <td>123</td>
            </tr>
            <tr>
                <td><a href="grava-cookie.php?login=temer&senha=456">
                    Temer</a></td>
                <td>456</td>
            </tr>
            <tr>
                <td><a href="grava-cookie.php?login=bolsonaro&senha=789">
                    Bolsonaro</a></td>
                <td>789</td>
            </tr>
        </table>
    </body>
</html>
