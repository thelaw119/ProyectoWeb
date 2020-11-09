<?php

/*
 * @autor Law
 * 
 */

session_start();
session_destroy();

header("Location:http://localhost/ProyectoWeb/vista/login.php");