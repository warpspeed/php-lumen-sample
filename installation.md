From your Mac environment `cd` into your projects directory and clone the project's github repository with the following command:
`git clone git@github.com:warpspeed/php-lumen-sample.git tasklist.dev`, where tasklist.dev is the domain name and root directory of your project.

Ensure that your WarpSpeed virtual machine is running with the command `vagrant up` in the directory housing your virtual machine. Run the `vagrant ssh` command and `cd` into `sites`. Within your vagrant environment, you can take advantage of WarpSpeed's site creation command. Run `warpspeed site:create php tasklist.dev --force`, replacing tasklist.dev with whatever domain you specified. `--force` is needed to overwrite the configuration files of the tasklist.dev directory created in your Mac environment in the previous step.

Add the 'tasklist.dev' domain to your `/etc/hosts` file along with the IP address of the WarpSpeed vagrant box: 192.168.88.10. This is most easily achieved by `sudo vim /etc/hosts`, entering insert mode by pressing `i`, navigating to an available line, adding the IP address and domain/root directory name, and saving the file with `esc` and `:wq`. Running the `sudo` command may prompt for the administrator's password, which is simply that of the your Mac account.

From your vagrant environment `/sites/tasklist.dev`, run `composer install` to load all the dependecies of the Lumen application. The depedencies are listed in the composer.json file and loaded into the `/vendor` directory. By design, git tracks neither the files inside the /vendor directory nor the .env file you must create based on the .env.template.

Copy and paste the contents of the .env.template into the newly created .env file. DB_DATABASE, DB_USERNAME, DB_PASSWORD and APP_KEY all need values. APP_KEY takes an alphanumeric string. For this sample project "randomKey" will suffice. If you prefer a dedicated database and MySQL user, click here to read the instructions for using WarpSpeed's MySQL commands. However, the Lumen application can read from and write to the vagrant box's default database, accessed through the root user with DB_DATABASE,  DB_USERNAME, DB_PASSWORD values of "vagrant".

Lastly, you will need to migrate the tables included in this sample project with `php artisan migrate` from your `/tasklist.dev` directory inside your vagrant environment.

Direct your prefered internet browser to the domain you specified in the `/etc/hosts` file and begin adding, completing, and clearing tasks from your list.
