@servers(['app-1' => 'root@192.168.10.12', 'app-2' => 'root@192.168.10.18'])

@task('deploy', ['on' => ['app-1', 'app-2']])
	cd /var/www/Deploy
	git pull origin master
@endtask

@task('init', ['on' => ['app-1', 'app-2']])
	mkdir -p /var/www/
	cd /var/www/
	git clone git@github.com:SexyPhoenix/Deploy.git
	cd Deploy
	composer install --no-dev
	chmod -R 0777 storage
@endtask
