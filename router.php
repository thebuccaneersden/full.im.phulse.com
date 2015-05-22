<?php
// Router for PHP's local web server

$mimetypes = [
  "3gp" => "video/3gpp",
  "apk" => "application/vnd.android.package-archive",
  "avi" => "video/x-msvideo",
  "bmp" => "image/x-ms-bmp",
  "csv" => "text/comma-separated-values",
  "doc" => "application/msword",
  "docx" => "application/msword",
  "flac" => "audio/flac",
  "gz" => "application/x-gzip",
  "gzip" => "application/x-gzip",
  "html" => "text/html",
  "ics" => "text/calendar",
  "kml" => "application/vnd.google-earth.kml+xml",
  "kmz" => "application/vnd.google-earth.kmz",
  "map" => "application/json",
  "m4a" => "audio/mp4",
  "mp3" => "audio/mpeg",
  "mp4" => "video/mp4",
  "mpg" => "video/mpeg",
  "mpeg" => "video/mpeg",
  "mov" => "video/quicktime",
  "odp" => "application/vnd.oasis.opendocument.presentation",
  "ods" => "application/vnd.oasis.opendocument.spreadsheet",
  "odt" => "application/vnd.oasis.opendocument.text",
  "oga" => "audio/ogg",
  "pdf" => "application/pdf",
  "pptx" => "application/vnd.ms-powerpoint",
  "pps" => "application/vnd.ms-powerpoint",
  "qt" => "video/quicktime",
  "swf" => "application/x-shockwave-flash",
  "tar" => "application/x-tar",
  "text" => "text/plain",
  "tif" => "image/tiff",
  "wav" => "audio/wav",
  "wmv" => "video/x-ms-wmv",
  "xls" => "application/vnd.ms-excel",
  "xlsx" => "application/vnd.ms-excel",
  "zip" => "application/x-zip-compressed",
  "html" => "text/html",
  "htm" => "text/html",
  "js" => "text/javascript",
  "css" => "text/css",
  "gif" => "image/gif",
  "jpg" => "image/jpeg",
  "jpeg" => "image/jpeg",
  "jpe" => "image/jpeg",
  "png" => "image/png",
  "svg" => "image/svg+xml",
  "txt" => "text/plain",
  "webm" => "video/webm",
  "woff2" => "application/font-woff2",
  "ogv" => "video/ogg",
  "ogg" => "audio/ogg"
];


date_default_timezone_set("UTC");

if( php_sapi_name() == "cli-server" )
{

  if( substr( $_SERVER["REQUEST_URI"], 0, 5) === '/api/' )
  {
      require( './api/index.php' );
      die();
  } else
  {
    $request = $_SERVER["REQUEST_URI"];
    if( $_SERVER["REQUEST_URI"] === '/' )
    {
      $request = '/index.html';
    }
    list( $request, ) = explode( '?', $request );
    
    if( file_exists( "./www{$request}" ) )
    {
      $requestExploded = explode( '.', $request );
      $extension = ( !empty( $requestExploded[sizeof($requestExploded)-1] ) ) ? $requestExploded[sizeof($requestExploded)-1] : null;

      if( !empty( $extension ) && array_key_exists( $extension, $mimetypes ) )
      {
        $mimetype = $mimetypes[$extension];
      } else
      {
        $mimetype = $mimetypes['text'];
      }

      $file = file_get_contents( "./www/{$request}" );
      header("Content-Type: {$mimetype}");
      print( $file );

    } else
    {
      header("HTTP/1.1 404 Not Found");
      $file = file_get_contents( "./www/404.html" );
      header("Content-Type: text/html");
      print( $file );
    }
  }
}
