{{R3M}}
{{$request = request()}}
Package: {{$request.package}}
Module: {{$request.module|uppercase.first}}
{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|uppercase.first}}
{{/if}}

{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} create  | [1]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} delete  | [2]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} disable | [3]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} enable  | [4]
{{binary()}} {{$request.package}} {{$request.module}} {{$request.submodule}} has     | [5]

[1]
[2]
[3]
[4]
[5]
