{{R3M}}
{{$request = request()}}
Package: {{$request.package}}

Module: {{$request.module|uppercase.first}}

{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|uppercase.first}}

{{/if}}

[1] {{binary()}} {{$request.package}} {{$request.module}}
[2] {{binary()}} {{$request.package}} {{$request.module}} backup
[3] {{binary()}} {{$request.package}} {{$request.module}} reload
[4] {{binary()}} {{$request.package}} {{$request.module}} restart
[5] {{binary()}} {{$request.package}} {{$request.module}} restore
[6] {{binary()}} {{$request.package}} {{$request.module}} setup
[7] {{binary()}} {{$request.package}} {{$request.module}} start
[8] {{binary()}} {{$request.package}} {{$request.module}} stop

[1] This info
[2] Backup Apache2 sites into Data/Apache2
[3] Reload Apache2 service
[4] Restart Apache2 service
[5] Restore Apache2 sites from Data/Apache2
[6] Setup Apache2 service to handle the framework and php
[7] Start Apache2 service
[8] Stop Apache2 service
