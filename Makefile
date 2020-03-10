default: build

build:
	bin/build.sh

clean:
	@if [ -d ".git" ]; then git clean -xdf --exclude ".env" --exclude ".idea" --exclude "web/app/uploads"; fi

deep-clean:
	@if [ -d ".git" ]; then git clean -xdf --exclude ".idea"; fi

run:
	cp .env.example .env
	docker-compose up

# Open a bash shell on the running container
bash:
	docker-compose exec wordpress bash

# Run tests
test:
	composer test
