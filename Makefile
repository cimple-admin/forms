.PHONY: assets
assets:
	docker run  -v "$(shell pwd)":/usr/src/app -w /usr/src/app node npm run build

