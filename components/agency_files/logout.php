<?php
session_start();
if (session_destroy()) {
    header("location: ../index.php?message=You Have Been Logout Out. If It Was A Mistake Than Click On Sign In Button Again.");
}
