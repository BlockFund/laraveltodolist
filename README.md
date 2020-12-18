# laravel-to-do

### Installation instructions

After you clone the repo,

1. Create an *.env*  file in the /docker/ directory.
2. Populate it with the contents emailed to you.
3. Create an *.env* file in the /www/ directory.
4. Populate it with the contents emailed to you.
5. Execute these commands:
1) cd docker
2) ./build.sh
3) docker volume create --name=mysql-5.7-bfc
4) ./run.sh
5) ./composer.sh install
6) ./artisan.sh migrate
7) ./npm.sh install
8) ./npm.sh run dev
