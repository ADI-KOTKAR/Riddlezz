





<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="" alt="" width="80" height="80">
  </a>

  <h2 align="center">Riddlezz</h2>

  <p align="center">
    Website using PHP with MongoDB Database and deployment on Heroku
    <br />
    <a href="https://github.com/othneildrew/Best-README-Template"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://drive.google.com/file/d/1TG90kIOGDsKfBk17zwHMx9bT8tkDvgGx/view?usp=sharing">View Demo</a>
    ·
    <a href="https://github.com/ADI-KOTKAR/Riddlezz.git/issues">Report Bug</a>
    ·
    <a href="https://github.com/ADI-KOTKAR/Riddlezz.git/issues">Request Feature</a>
  </p>
</p>




<!-- TABLE OF CONTENTS -->


## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)



<!-- ABOUT THE PROJECT -->
## About The Project
![image](https://drive.google.com/open?id=1r4TlwfQKvZCWyL1-eSqyT6GoFNeHkVFA)


There are many great PHP websites available on GitHub, however, there are very few which explore new, fast and latest cloud databases like MongoDB Atlas. This is a simple website which is a result of Project assigned to me for my PHP Certification, so I tried my best to try something different and use all basic functionalities of PHP.

What's Different?
* Use of NoSQL database instead of traditional MySQL database.
* Use of PHPMailer which can be used from anywhere and system independent.
* Use of MongoDB Atlas which handle large unstructured data in the form of JSON.
* Use of Heroku platform for hosting PHP Website instead of traditional cpanel hosting platforms.

A list of commonly used resources that I find helpful are listed in the acknowledgements.

### Built With

I am listing the main things which are needed for this project:

* [PHP](https://www.php.net/)
* [MongoDB with PHP](https://docs.mongodb.com/drivers/php)
* [MongoDB Atlas](https://www.mongodb.com/cloud/atlas)
* [PHPMailer](https://github.com/PHPMailer/PHPMailer)
* [Heroku](https://dashboard.heroku.com/)


<!-- GETTING STARTED -->
## Getting Started

First of all you will need a database of your own which should be created in MongoDB Atlas , I created out cloud-database so that handling of data can be done in JSON format and high secuirity of database.

Create a free cluster in MongoDB Atlas with your account, configure all stuff like network access, database access, and create a database with collection by following structure:

Database : Riddlezz
Collection : user_info 
```
 [
    {
        '_id' : '',
        'email' : '',
        'contact_no' : '',
        'progress_count' : '',
        'points' : '',
        'incorrect_attempts' : '',
        'time_start' : '',
        'time_end' : '',
        'otp' : '',
        'verification' : ''
    }
 ]

```

A JSON file which contains all the Questions along with its question_number, question and answer.

```

[
    {
        'id' : '',
        'question' : '',
        'answer' : ''
    }
]

```

### Prerequisites


* PHP
* MongoDB 

### Installation

Considering you have PHP environment set (XAMPP in my case) and composer installed.

1. Generate your MongoDB encoded URL for connecting your site to Atlas. 
2. Clone the repo
```sh
git clone https://github.com/your_username_/Project-Name.git
```
3. Run follwing command for initializing, this will create composer.json, composer.lock files.
```
composer init
```
4. Install MongoDB PHP driver
```
composer require mongodb/mongodb
```
5. Setup MongoDB PHP Driver by referring - https://docs.mongodb.com/drivers/php 
6. Add this to your php.ini file and start your Apache server:
```
extension=php_mongodb.dll
```
7. Create a file named 'secret_key.php' in Database folder and write this code:
```
<?php 

    //Database Connection
    function connectDB(){
        $client = new MongoDB\Client(
            //your encoded url of atlas in quotes
        );

        $db = $client->Riddlezz;
        $collection = $db->user_info;
        
        //echo "Connected Succesfully";
        return $collection;
    }

?>
```
8. In PHPMailer/index.php do the following changes mentioned in comments. 
9. Till here your website is ready for localhost, now lets move on hosting:
    * I have used Heroku platform for hosting, just create an account and an app with PHP environment.
    * We are basically hosting our github repo on Heroku with automated deployment ie. whenever I commit changes    in my repo, it will automatically affect changes on my website. 
    * Refer: https://youtu.be/zavb4WG8x-8
10. You are ready to go!!!


<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/ADI-KOTKAR/Riddlezz.git/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

## Contributors



<!-- CONTACT -->
## Contact

Contact Developer - [Mail](developer.adi.kotkar@gmail.com) - developer.adi.kotkar@gmail.com

Project Link: [https://github.com/ADI-KOTKAR/Riddlezz.git](https://github.com/ADI-KOTKAR/Riddlezz.git)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Img Shields](https://shields.io)
* [Choose an Open Source License](https://choosealicense.com)






<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/ADI-KOTKAR/Riddlezz
[contributors-url]: https://github.com/ADI-KOTKAR/Riddlezz.git/graphs/contributors
[activity-shield]: https://img.shields.io/github/commit-activity/m/ADI-KOTKAR/Riddlezz
[activity-url]: https://github.com/ADI-KOTKAR/Riddlezz.git/commits/master
[version-shield]: https://img.shields.io/github/v/tag/ADI-KOTKAR/Riddlezz
[version-url]: https://github.com/ADI-KOTKAR/Riddlezz.git/releases
[language-shield]: https://img.shields.io/github/languages/top/ADI-KOTKAR/Riddlezz
[language-url]: https://www.php.net/
[forks-shield]: https://img.shields.io/github/forks/ADI-KOTKAR/Riddlezz
[forks-url]:https://github.com/ADI-KOTKAR/Riddlezz.git/network/members
[stars-shield]: 	https://img.shields.io/github/stars/ADI-KOTKAR/Riddlezz
[stars-url]: https://github.com/ADI-KOTKAR/Riddlezz.git/stargazers
[issues-shield]: https://img.shields.io/github/issues/ADI-KOTKAR/Riddlezz
[issues-url]: https://github.com/ADI-KOTKAR/Riddlezz.git/issues
[license-shield]: https://img.shields.io/github/license/ADI-KOTKAR/Riddlezz
[license-url]: https://github.com/ADI-KOTKAR/Riddlezz.git/blob/master/LICENSE


