# WarpSpeed Lumen Sample Application

[Lumen](http://lumen.laravel.com/) is a PHP micro-framework built by the developers of Laravel. [WarpSpeed](https://warpspeed.io) makes it incredibly simple to work with and deploy Lumen and other PHP based projects. This guide will help you get up and running with Lumen and WarpSpeed.

## Vagrant Development Envrionment

This guide assumes that you are using the WarpSpeed Vagrant development environment. Doing so will help you follow best practices and keep your development and production environments as similar as possible. If you are not using WarpSpeed Vagrant, ignore the sections that involve using the VM.

## Fork and Clone the Sample Project

The best way to begin using this project is to fork the repository to your own GitHub account. This will allow you to make updates and begin using the project as a template for your own work. To fork the repository, simply click the "Fork" button for this repository.

Once you have forked the repository, you can clone it to your development environment or use pull-deploy to deploy it directly to a server configured with WarpSpeed.io.

Ideally, you should be using the WarpSpeed Vagrant development environment. The instructions below will assume this, although it isn't necessary if you already have a python environment set up.

To clone the repository to your local machine (not in your VM), use the following command:

```
	cd ~/Sites
	git clone git@github.com:YOUR_USERNAME/php-lumen-sample.git warpspeed-lumen.dev
```

## Create a Database

The sample project uses a MySQL database. This can easily be swapped with an SQLite or PostgreSQL database. To create a MySQL database and user with WarpSpeed, do the following:

```
	# RUN THESE COMMANDS FROM YOUR LOCAL MACHINE
	
	# cd to your warpspeed-vagrant directory
	# and ssh into your VM
	cd ~/warpspeed-vagrant
	vagrant ssh

	# then, run the db creation command
	warpspeed mysql:db tasks_db tasks_user password123
```

This will create a database named "tasks\_db" along with a user, "tasks\_user", that has access via the password "password123". Feel free to change the values to suit your needs (hint: perhaps choosing a better password would be wise).

## Create a WarpSpeed Site

We need to create the appropriate server configuration files to run the site. To configure Nginx and Passenger to run your site, perform the following:

```
# if you aren't already in your VM then...
# cd to your warpspeed-vagrant directory
# and ssh into your VM
cd ~/warpspeed-vagrant
vagrant ssh

# then, run the site creation command
# notice that --force is used because the site directory already exists
warpspeed site:create php warpspeed-lumen.dev --force
```

## Configure your .env File

Lumen requires several environment variables to function properly. The .env.template file contains the requisite fields without their respective values. To configure Lumen, do the following: 

```
# cd to your project's root directory
# copy the .env.template file's contents
# into a file named .env 
cd ~/Sites/warpspeed-lumen.dev
cp .env.template .env

# open the .env file and complete the requisite fields
nano .env

# the .env file should resemble the following when complete
APP_ENV=local
APP_DEBUG=true
APP_KEY=YOUR_SECRECT_KEY_HERE
APP_LOCALE=en
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=tasks_db
DB_USERNAME=tasks_user
DB_PASSWORD=password123
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=database
```

## Install Lumen and Run Migrations

Lumen utilizes Composer to manage its dependcies. To install the required libraries listed in the `composer.json` file, run the following commands: 

```
# RUN THESE FROM YOUR VM

# cd to your project's root directory
cd ~/sites/warpspeed-lumen.dev

# install the libraries listed in the composer.json file
composer install
```

Lumen utilizes the Artisan Command Line Interface to handle migrations and the autogeneration of boilerplate code. Although the tasks_db MySQL database already exists in your VM, we still need to create a structured table to store our task objects.

```
 # RUN THESE FROM YOUR VM
 
 # cd to your project's root directory
 cd ~/sites/warpspeed-lumen.dev
 
 # migrate the tasks table
 php artisan migrate
```

The source code used to generate the `tasks` table is located in `~/Sites/warpspeed-lumen.dev/database/migrations`.

## Add a Hosts File Entry

To access your new Lumen site, you will need to add an entry to your hosts file on your local machine (not your VM). To do so, perform the following:

```
# RUN THESE COMMANDS FROM YOUR LOCAL MACHINE

# open a terminal and run the following command (for Mac)
sudo nano /etc/hosts

# add this line to the end of the file
192.168.88.10 warpspeed-lumen.dev

# exit and save
```
Now, whenever you access "warpspeed-lumen.dev" in the browser, you will be directed to your Lumen site within your VM.

## Restart your Site and Celebrate

Finally, we need to reload the site configuration to finalize and effectuate our changes. To do so, perform the following: 

```
# RUN THESE COMMANDS FROM YOUR VM

# reload the site configuration
warpspeed site:reload warpspeed-lumen.dev
```

Now you can access http://warpspeed-lumen.dev on your local machine to view the site.

## Troubleshooting 

If you have issues and need to troubleshoot, view the NGINX error log for helpful clues.

```
# RUN THESE COMMANDS FROM YOUR VM

# open the NGINX error log
sudo nano /var/log/nginx/error.log

# ...or keep an open tab of the NGINX error log
sudo tail -f /var/log/nginx/error.log
```

# License
This sample project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).