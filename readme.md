# WS-Todo Coding Challenge

Requirements:
- PHP >= 7.0.0
- NodeJS 6.9.1
- NPM ^3.10
- VirtualBox: https://www.virtualbox.org/wiki/Downloads
- Vagrant: https://www.vagrantup.com/downloads.html

## Installation Steps

### 1. Clone the repo
```bash
git clone git@github.com:ezerw/ws-todo.git
```

### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Compile assets
```bash
npm run dev 
```

### 4. Add the .env config file and generate the key
```
cp .env.example .env
php artisan key:generate
```

### 5. Set the VM config
```bash
php vendor/bin/homestead make
```

### 6. Add the host to your hosts file
```bash
sudo vim /etc/hosts

```
and add the line

```bash
192.168.10.10 homestead.app
```

### 7. Download and boottrap the Vagrant box
```bash
vagrant up
```

### 8. SSH in the VM and run migrations
```bash
php artisan migrate
```

### 9. Visit http://homestead.app

<hr>

## Tests
Run `phpunit` from the project root inside the vm
