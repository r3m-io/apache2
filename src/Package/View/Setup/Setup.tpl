{{R3M}}
{{$register = Package.R3m.Io.Basic:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Basic:Import:role.system()}}
{{Package.R3m.Io.Basic:Main:apache2.setup()}}
{{Package.R3m.Io.Basic:Main:openssl.init()}}
{{Package.R3m.Io.Basic:Main:cron.init()}}
{{Package.R3m.Io.Basic:Main:apache2.restore()}}
{{Package.R3m.Io.Basic:Main:apache2.backup()}}
{{Package.R3m.Io.Basic:Main:apache2.stop()}}
{{Package.R3m.Io.Basic:Main:apache2.start()}}
{{/if}}