# WS-Todo Coding Challenge

Requirements:
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

### 3. Add the .env config file and generate the key
```
cp .env.example .env
php artisan key:generate
```

### 4. Download and boottrap the Vagrant box
```bash
vagrant up
```