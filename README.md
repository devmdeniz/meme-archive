
# Meme-Archive
## What is Meme-Archive?
Meme-Archive project is a new version of the memes (also known as caps in Turkish) that we find funny on the internet and want to look back at some time later. It is actually a new version of caps. Alt: Meem) are archived and archived for easy finding.
## Installation
### Requirements
* Composer
* PHP

### Windows

1. Clone this project.
```bash
    git clone https://github.com/devmdeniz/meme-archive
    cd meme-archive
```

2. Run Composer Install
```bash
    composer install --ignore-platform-reqs
```

3. At this stage, the project should be up and running
```bash
    php artisan serve
```
if project starting running press ctrl c to close

4. Edit .env file. Edit database and website settings
5. When connect database, then run migrate for databases
```bash
    php artisan migrate
```
6. If you want, you can seed database
```bash
    php artisan db:seed AdminSeeder
```

7. Everything's all set! You can deploy and run the project


# Images from inside the website
