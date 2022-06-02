# External Password

An app for Nextcloud to allow an administrator to direct a user to an external site for changing their password. This is useful in conjunction with an app like [External User Authentication](https://apps.nextcloud.com/apps/user_external).

Place this app in **nextcloud/apps/**

## Building the app

The app can be built by using the provided Makefile by running:

    make

This requires the following things to be present:
* make
* docker: for signing the app
* tar: for building the archive

## Publish to App Store

First get an account for the [App Store](http://apps.nextcloud.com/) then run:

    make && make appstore

The archive is located in build/artifacts/appstore and can then be uploaded to the App Store.
