<?php
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  
$dir = __DIR__;
$dir = "E:/doing/code_doing/php-web-full-stack/uploads/";

if(!file_exists($dir)){
  die("Folder không tồn tại: ".$dir);
}

$dir = __DIR__;
function listFilesRecursive($folder) {
  $iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS),
      RecursiveIteratorIterator::SELF_FIRST
  );
  
  $files = array();
  foreach ($iterator as $file) {
      if ($file->isFile()) {
          $files[] = $file->getPathname();
      }
  }
  
  return $files;
}

$folder = __DIR__;
$fileList = listFilesRecursive($folder);

foreach ($fileList as $file) {
  echo $file . "<>\n";
}
