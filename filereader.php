<?php
function dirreader( $dir, $excludes = array( '.', '..' ) ) {
    $files = array(); //array of files to read from the filesystem
    if ( !is_dir( $dir ) ) {
        return null; // no directory specified
    }
    if ( !( $filedirectory = opendir( $dir ) ) ) {
        return null;
    }
    while (  ( $file = readdir( $filedirectory ) ) !== false ) {
        if ( in_array( $file, $excludes ) ) {
            continue;
        }
        $files[] = $dir . '/' . $file;

    }
    closedir( $filedirectory );
    return $files;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset( $_FILES['formFile'] ) ) {
        $allow = array('jpg', 'png', 'gif');
        if (in_array($_FILES['formFile']['type'], $allow)) {
            echo ('only jpg, png and gif images are supported');
            exit();
        }
        // if ( $_FILES['formFile']['size'] > 1 * 1024) {
        //     echo "File size should be less then 1 mb";
        //     exit();
        // }
               
        foreach ( $_FILES['formFile']['tmp_name'] as $file => $v ) {
            $filleName    = $_FILES['formFile']['name'][$file];
            $filleType    = $_FILES['formFile']['type'][$file];
            $filleTmpName = $_FILES['formFile']['tmp_name'][$file];
            $filleSize    = $_FILES['formFile']['size'][$file];
            
            move_uploaded_file( $filleTmpName, 'images/' . $filleName );
        }

    }
}