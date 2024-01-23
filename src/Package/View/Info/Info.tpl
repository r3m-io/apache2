{{R3M}}
{{$request = request()}}
Package: {{$request.package}}
Module: {{$request.module|uppercase.first}}
{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|uppercase.first}}
{{/if}}

{{binary()}} r3m_io/basic                   | Basic options
{{binary()}} r3m_io/basic setup             | Basic setup
{{binary()}} r3m_io/basic update            | Basic update
{{binary()}} r3m_io/basic apache2           | apache2
{{binary()}} r3m_io/basic apache2 backup    | apache2 backup
{{binary()}} r3m_io/basic apache2 reload    | apache2 reload
{{binary()}} r3m_io/basic apache2 restart   | apache2 restart
{{binary()}} r3m_io/basic apache2 restore   | apache2 restore
{{binary()}} r3m_io/basic apache2 site ...  | info
{{binary()}} r3m_io/basic apache2 site ...  | create
{{binary()}} r3m_io/basic apache2 site ...  | delete
{{binary()}} r3m_io/basic apache2 site ...  | disable
{{binary()}} r3m_io/basic apache2 site ...  | enable
{{binary()}} r3m_io/basic apache2 site ...  | has
{{binary()}} r3m_io/basic apache2 start     | apache2 start
{{binary()}} r3m_io/basic apache2 stop      | apache2 stop
{{binary()}} r3m_io/basic openssl init      | openssl init
{{binary()}} r3m_io/basic php backup        | php backup
{{binary()}} r3m_io/basic php restore       | php restore
{{binary()}} r3m_io/basic php restart       | php restart
{{binary()}} r3m_io/basic php start         | php start
{{binary()}} r3m_io/basic php stop          | php stop
