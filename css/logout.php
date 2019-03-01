<?php
session_start();
session_destroy();
include "function.php";
location("index.php");