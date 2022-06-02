# This file is licensed under the Affero General Public License version 3 or
# later. See the COPYING file.
# @author Raoul Snyman <raoul@snyman.info>
# @copyright Raoul Snyman 2022

# Makefile for building and packaging the "externalpassword" Nextcloud app.
#
# Dependencies:
# * make
# * docker
#

app_name=$(notdir $(CURDIR))
build_tools_directory=$(CURDIR)/build/tools
source_build_directory=$(CURDIR)/build/artifacts/source
source_package_name=$(source_build_directory)/$(app_name)
appstore_build_directory=$(CURDIR)/build/artifacts/appstore
appstore_package_name=$(appstore_build_directory)/$(app_name)

all: distclean source appstore

# Removes the appstore build
.PHONY: clean
clean:
	rm -rf ./build

# Same as clean but also removes dependencies installed by composer, bower and
# npm
.PHONY: distclean
distclean: clean
	rm -rf vendor
	rm -rf node_modules
	rm -rf js/vendor
	rm -rf js/node_modules

# Builds the source package
.PHONY: source
source:
	rm -rf $(source_build_directory)
	mkdir -p $(source_build_directory)
	tar -czf $(source_package_name).tar.gz \
	--exclude-vcs \
	--exclude="../$(app_name)/build" \
	--exclude="../$(app_name)/js/node_modules" \
	--exclude="../$(app_name)/node_modules" \
	--exclude="../$(app_name)/*.log" \
	--exclude="../$(app_name)/js/*.log" \
	../$(app_name)

# Builds the source package for the app store, ignores php and js tests
.PHONY: appstore
appstore:
	rm -rf $(appstore_build_directory)
	mkdir -p $(appstore_build_directory)
	tar -czf $(appstore_package_name).tar.gz \
	--exclude-vcs \
	--exclude="../$(app_name)/build" \
	--exclude="../$(app_name)/tests" \
	--exclude="../$(app_name)/Makefile" \
	--exclude="../$(app_name)/*.log" \
	--exclude="../$(app_name)/phpunit*xml" \
	--exclude="../$(app_name)/composer.*" \
	--exclude="../$(app_name)/js/node_modules" \
	--exclude="../$(app_name)/js/tests" \
	--exclude="../$(app_name)/js/test" \
	--exclude="../$(app_name)/js/*.log" \
	--exclude="../$(app_name)/js/package.json" \
	--exclude="../$(app_name)/js/bower.json" \
	--exclude="../$(app_name)/js/karma.*" \
	--exclude="../$(app_name)/js/protractor.*" \
	--exclude="../$(app_name)/package.json" \
	--exclude="../$(app_name)/bower.json" \
	--exclude="../$(app_name)/karma.*" \
	--exclude="../$(app_name)/protractor\.*" \
	--exclude="../$(app_name)/.*" \
	--exclude="../$(app_name)/js/.*" \
	../$(app_name)

.PHONY: sign
sign: appstore
	mkdir -p "$(CURDIR)/dist"
	cd "$(CURDIR)/dist" && tar -xf $(appstore_package_name).tar.gz
	-docker stop externalpassword-sign
	docker run --rm -d --name externalpassword-sign \
		--volume "$(CURDIR)/dist/externalpassword:/externalpassword" \
		--volume "${HOME}/.nextcloud/certificates:/certificates" nextcloud
	sleep 5s
	docker exec -ti externalpassword-sign php occ integrity:sign-app \
		--path /externalpassword \
		--privateKey=/certificates/externalpassword.key \
		--certificate=/certificates/externalpassword.crt
	docker stop externalpassword-sign
	cd "$(CURDIR)/dist" && tar -czf externalpassword.tar.gz externalpassword
