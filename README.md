
## About Project

App for test skills and some fun

<p>Laravel 12</p>
<p>PHP 8.4</p>
<p>Docker</p>

## SetUp

<ul>
    <li>
        cp .env.example .env and fill data
    </li>  
    <li>
        composer update
    </li> 
    <li>
        php artisan key:generate
    </li> 
    <li>
        php artisan jwt:secret
    </li> 
    <li>
       docker compose build
    </li>
    <li>
       docker compose up -d
    </li>
</ul>

