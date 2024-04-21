<?php


include "config.php";





session_start();

session_unset();

session_destroy();
echo "<script>
				alert('Logout Successful');
			</script>";
		echo "<script> location.href='index.php'; </script>";
?>