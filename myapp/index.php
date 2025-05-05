<?php
require_once "../myapp/lib/database.php";
require_once "../myapp/config/config.php";
require_once "../myapp/core/route.php";

//Nếu lần đầu sẽ không có sẵn session nhưng những lần khác kiểm tra vui lòng session_datroy để tránh lỗi

route();