From your Mac or PC environment `cd` into your projects directory and clone the following github repository with the following command:
`git clone git@github.com:keentreat/lumen-todolist.git todolist.dev`, where todolist.dev is the domain name of the project.

(From your vagrant environment)
Ensure that your virtual machine is running with the command `vagrant up` in the directory housing your virtual machine. Run the `vagrant ssh` command and `cd` into `sites`. Now that you're inside your vagrant environment, you can take advantage of WarpSpeed's site creation command. Run `warpspeed site:create php todolist.dev --force`, replacing todolist.dev with whatever domain you specified. `--force` is needed to overwrite the configuration files of the todolist.dev directory created in your Mac/PC environment in the previous step.

Add the 'todolist.dev' domain to your `/etc/host` file along with the IP address of the WarpSpeed vagrant box: 192.168.88.10.

From your vagrant environment `/sites/todolist.dev`, run `composer install` to load all the dependecies of the Lumen application. The depedencies are listed in the composer.json file and loaded into the /vendor directory. By design, git tracks neither the files inside the /vendor directory nor the .env file you must create based on the .env.template.

DB_DATABASE, DB_USERNAME, DB_PASSWORD and APP_KEY all need values. APP_KEY takes an alphanumeric string. For this sample project "randomKey" will suffice. If you prefer a dedicated database and MySQL user, click here to read the instructions for using WarpSpeed's MySQL commands. However, the Lumen application can read from and write to the vagrant box's default database, accessed through the root user with DB_DATABSE,  DB_USERNAME, DB_PASSWORD values of "vagrant".

Lastly, you will need to migrate the tables included in this sample project with `php artisan migrate` from your `/todolist.dev` directory inside your vagrant environment.
