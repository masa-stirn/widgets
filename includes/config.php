<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//CHANGE TO MATCH YOUR PAGES
$config->nav1['db-test.php'] = 'DB-test';
$config->nav1['customer_list.php'] = 'Customers';
$config->nav1['banned_books_list.php'] = 'Banned books';
$config->nav1['daily.php'] = 'Daily';
$config->nav1['contact.php'] = 'Contact';
$config->nav1['reservation.php'] = 'Reservation';
$config->nav1['links.php'] = 'Links';


/* 
Bellow is an array of images to be used on contact.php in the function named randomize()
*/

$config->heros[] = '<img src="images/coulson.png" />';
$config->heros[] = '<img src="images/fury.png" />';
$config->heros[] = '<img src="images/hulk.png" />';
$config->heros[] = '<img src="images/thor.png" />';
$config->heros[] = '<img src="images/black-widow.png" />';
$config->heros[] = '<img src="images/captain-america.png" />';
$config->heros[] = '<img src="images/machine.png" />';
$config->heros[] = '<img src="images/iron-man.png" />';
$config->heros[] = '<img src="images/loki.png" />';
$config->heros[] = '<img src="images/giant.png" />';
$config->heros[] = '<img src="images/hawkeye.png" />';

//loads an array named $planets with images and text for daily rotation

$config->planets[] = '
<p><img src="images/mercury.gif" style="float:left; margin:0 10px 10px 0" />Mercury concerns communication and short-distance travel. Language, words, speech.</p>
<p>
Through the position of Mercury in your horoscope you can see the areas that will be of most interest to you and stimulate your mental energies.</p>
';

$config->planets[] = '
<p><img src="images/venus.gif" style="float:left; margin:0 10px 10px 0" />Venus is the planet of love, beauty, art, aesthetics, value, fairness, socializing and relationships.</p>
<p>
The planet Venus astrologically represents the desire to bring together things that compliment each other. There is a strong need to create harmony and balance in the environment and in relationships.</p>
';

$config->planets[] = '
<p><img src="images/mars.gif" style="float:left; margin:0 10px 10px 0" />Mars represents how we assert ourselves in the world. The warrior archetype. anger, sexuality, war, sports.</p>
</p>
<p>
Through the position of Mars in your horoscope you can see what best motivates someone to go after what they want in life. An understanding of this desire can help you to be the instinctive master of your life.
</p>
';

$config->planets[] = '
<p><img src="images/jupiter.gif" style="float:left; margin:0 10px 10px 0" />Jupiter is the planet of expansion. International travel. Faith belief, the religious impulse. Higher education. Law, philosophy, ethics.
</p>
<p>
The position of Jupiter in your horoscope chart describes how you grow and evolve in the relative area of your life. The house position of Jupiter represents your desire and your search for meaning in your life.
</p>
';

$config->planets[] = '
<p><img src="images/saturn.gif" style="float:left; margin:0 10px 10px 0" />Saturn is the planet of restriction. Boundaries, tests, limitations. Manifestation. Hard work, responsibility.
</p>
<p>
The key is knowing how to work with the transits and cycles of Saturn because we do feel the the effects of it for a while since it is in a sign for about 2 1/2 years at a time.</p>
<p>
It completes its first trip around the zodiac by the age of thirty and its second just before the age of sixty. This marks the beginnings of middle and old age. Understanding the transits of Saturn provides a sense of self awareness this is of benefit here.
</p>
';

$config->planets[] = '
<p><img src="images/uranus.gif" style="float:left; margin:0 10px 10px 0" />Uranus is the planet of disruption, liberation, sudden changes. Revolution Technology.
</p>
<p>
In general all Uranus ruled changes have several things in common: 
They strike like lightning. They tend to turn a person\'s world upside down. They are frequently beyond the control of the person involved.</p>
<p>
The changes are radical and cannot as a rule be reversed e.g. personal achievement, status in society -- public honour or notoriety; accidents; impersonal relationships.
</p>
';

$config->planets[] = '
<p><img src="images/neptune.gif" style="float:left; margin:0 10px 10px 0" />This is the planet of transcendence. Illusion, delusion, image, spirituality, mysticism.
</p>
<p>
As the planet Neptune continually moves around the zodiac it passes over different areas in your personal birth chart. Since it is such a slow moving planet it will impact you for long periods of time.</p>
<p>
As an area is touched by Neptune it is best to know how that is affecting you. If it is a creative, inspirational impact then it is best to make use of it. On other hand it may point to times when you have to be more careful in your due diligence when it comes to both work and home life.
</p>
';

$config->planets[] = '
<p><img src="images/pluto.gif" style="float:left; margin:0 10px 10px 0" />Pluto is the planet of death and rebirth. The underworld. Taboos. Eroticism and Shadow. Healing and regeneration.</p>
<p>
The zodiac sign positions of Pluto are considered to possess great historical significance. Fundamental upheavals and drastic transformations in areas of human life and civilization are expected when Pluto travels through the different signs. Pluto passing through each zodiac sign is always considered to produce a change of a permanent nature.</p>
';

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->title = THIS_PAGE;
$config->banner = 'Widgets';
$config->loadhead = '';//place items in <head> element

// defeault page values
$config->siteName = 'Masa Wu ITC240';
$config->slogan = 'Whatever it is you do, we do it better';
$config->pageHeader = 'The developer forgot to put a page header';
$config->subHeader = 'The developer forgot to put a sub header';
$config->sloganIcon = '';//will be replaced in contact.php by hero icons
$config->planetContent = '';//will be replaced in contact.php by hero icons

//switch(THIS_PAGE){
//        
//    case 'contact.php':    
//        $config->title = 'Contact Page';    
//    break;
//    
//    case 'appointment.php':    
//        $config->title = 'Appointment Page';
//        $config->banner = 'Widget Appointments!';
//    break;
//        
//   case 'template.php':    
//        $config->title = 'Template Page';    
//    break;    
//        
//        
//}

switch(THIS_PAGE){
        
    case 'template.php':
        $config->title = "My template page";
        $config->pageHeader = 'Put page ID here';
        $config->subHeader = 'Put more info about page here';
    break;   
    case 'customer_list.php':
        $config->title = "A list of customers";
        $config->pageHeader = 'Our customers';
        $config->subHeader = "Don't sue us because we're using celebrity photos.";
    break; 
    case 'banned_books_list.php':
        $config->title = "A list of banned books";
        $config->pageHeader = 'THE ultimate book list.';
        $config->subHeader = "Explore the sins.";
    break; 
    case 'contact.php':
        $config->title = "Please contact us";
        $config->pageHeader = 'Let us know what we can do for you';
        $config->subHeader = 'We appreciate your feedback';
        $config->sloganIcon = randomize($heros);
    break;    
    case 'reservation.php':
        $config->title = "My reservation page";
        $config->pageHeader = 'Win your next holiday trip';
        $config->subHeader = 'Fill out the form and cross your fingers';
    break;  
        case 'daily.php':
        $config->title = "My coffee page";
        $config->pageHeader = 'Daily coffee specials';
        $config->subHeader = 'All our coffee is special :)';
    break;  
        case 'links.php':
        $config->title = "My links page";
        $config->pageHeader = 'Discover Seattle museums';
        $config->subHeader = 'Check out my top 5 museum suggestions';
        $config->planetContent = rotate($planets);
    break; 
    case 'db-test.php':
        $config->title = "My database test page";
        $config->pageHeader = 'Database test';
        $config->subHeader = 'Check this page to see if your database credentials are correct.';
    break; 
    
};

function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

/**
 * returns a daily item from an array sent to it.
 *
 * Uses count of array to determine highest legal rotated item.
 *
 * Uses day of month and modulus to rotate through daily items in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo rotate($arr); #will return a different image each day for three days
 * </code>
 * 
 * @param array array of HTML strings to display on a daily rotation
 * @return string HTML at specific index of array based on day of month
 * @see rotate() 
 * @todo none
 */
function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate


//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}

function makeLinks($nav){
    
    $myReturn = '';
    foreach($nav as $key => $value){
        
        if(THIS_PAGE == $key)
        {//current page add active class 
             $myReturn .= '
        <li class="nav-item">
        <a class="nav-link active" href="' . $key . '">' . $value . '</a>
        </li>';
            
            
        }else{//add formatting
             $myReturn .= '
        <li class="nav-item">
        <a class="nav-link" href="' . $key . '">' . $value . '</a>
        </li>';
            
        }
       
    }
    
    return $myReturn;
    
}//end makeLinks()


?>