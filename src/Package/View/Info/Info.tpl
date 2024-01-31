{{R3M}}
{{$request = request()}}
Package: {{$request.package}}
Module: {{$request.module|uppercase.first}}
{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|uppercase.first}}
{{/if}}

[01] {{binary()}} {{$request.package}}
[02] {{binary()}} {{$request.package}} apache2
[03] {{binary()}} {{$request.package}} apache2 backup
[04] {{binary()}} {{$request.package}} apache2 reload
[05] {{binary()}} {{$request.package}} apache2 restart
[06] {{binary()}} {{$request.package}} apache2 restore
[07] {{binary()}} {{$request.package}} apache2 setup
[08] {{binary()}} {{$request.package}} apache2 site
[09] {{binary()}} {{$request.package}} apache2 site create
[10] {{binary()}} {{$request.package}} apache2 site delete
[11] {{binary()}} {{$request.package}} apache2 site disable
[12] {{binary()}} {{$request.package}} apache2 site enable
[13] {{binary()}} {{$request.package}} apache2 site has
[14] {{binary()}} {{$request.package}} apache2 start
[15] {{binary()}} {{$request.package}} apache2 stop
[16] {{binary()}} {{$request.package}} openssl
[17] {{binary()}} {{$request.package}} openssl init
[18] {{binary()}} {{$request.package}} php
[19] {{binary()}} {{$request.package}} php backup
[20] {{binary()}} {{$request.package}} php restore
[21] {{binary()}} {{$request.package}} php restart
[22] {{binary()}} {{$request.package}} php start
[23] {{binary()}} {{$request.package}} php stop
[24] {{binary()}} {{$request.package}} setup
[25] {{binary()}} {{$request.package}} update

[01] This info
[02] Apache2 options
[03] Backup Apache2 sites into Data/Apache2
[04] Reload Apache2 service
[05] Restart Apache2 service
[06] Restore Apache2 sites from Data/Apache2
[07] Setup Apache2 service to handle the r3m_io/framework and PHP
[08] Apache2 site info
[09] Create an apache2 site config
[10] Delete an apache2 site config
[11] Disable an apache2 site config
[12] Enable an apache2 site config
[13] Check if an apache2 site config exists
[14] Start Apache2 service
[15] Stop Apache2 service
[16] Openssl options
[17] Initialize the openssl config for development
[18] PHP options
[19] Backup PHP .ini file into Data/Php
[20] Restore PHP .ini file from Data/Php
[21] Restart php-fpm service
[22] Start php-fpm service
[23] Stop php-fpm service
[24] Setup the {{$request.package}} package
[25] Update the {{$request.package}} package
