{{R3M}}
{{$request = request()}}
Package: {{$request.package}}
Module: {{$request.module|uppercase.first}}
{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|uppercase.first}}
{{/if}}

{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | info [1]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | create [2]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | delete [3]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | disable [4]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | enable[5]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} has | [6]

[1] This info
[2] Create an apache2 site config
[3] Delete an apache2 site config
[4] Disable an apache2 site config
[5] Enable an apache2 site config
[6] Check if an apache2 site config exists
