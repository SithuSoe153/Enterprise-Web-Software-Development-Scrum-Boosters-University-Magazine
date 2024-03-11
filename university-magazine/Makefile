build:
	docker compose build --no-cache --force-rm
chmod:
	sudo chmod -R 777 .
kill:
	@docker ps -q | xargs -r docker stop
stop:
	docker compose stop
up:
	docker compose up -d
migrate:
	docker compose exec backend php artisan migrate
seed:
	docker compose exec backend php artisan db:seed
mseed:
	docker compose exec backend php artisan migrate:fresh --seed