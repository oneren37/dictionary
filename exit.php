<?php
setcookie('user', '', time() - 3600 * 24, "/");
header("Location: /");