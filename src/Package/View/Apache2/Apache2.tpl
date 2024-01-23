{{R3M}}
{{$request = request()}}
Package: {{$request.package}}
Module: {{$request.module|uppercase.first}}
{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|uppercase.first}}
{{/if}}

{{binary()}} {{$request.package}} {{$request.module}} backup | [1]
{{binary()}} {{$request.package}} {{$request.module}} reload | [1]
{{binary()}} {{$request.package}} {{$request.module}} restart | [1]
{{binary()}} {{$request.package}} {{$request.module}} restore | [1]
{{binary()}} {{$request.package}} {{$request.module}} setup | [1]
{{binary()}} {{$request.package}} {{$request.module}} start | [1]
{{binary()}} {{$request.package}} {{$request.module}} stop | [1]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | [2]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | [3]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | [4]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} ... | [5]

[1] This info
[2] Create an apache2 site config
[3] Delete an apache2 site config
[4] Disable an apache2 site config
[5] Enable an apache2 site config
[6] Check if an apache2 site config exists
