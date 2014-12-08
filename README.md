foodie-advenure
===============

Fun web app that lets users randomly select restaurants for Restaurant Weeks or just to try something new for an adventurous night out.

Foodie Adventure randomly selects a participating restaurant to visit during Restaurant Week. Users select one or more counties and they are presented with a single choice of a restaurant on a Google map along with the restaurant's Twitter page, menu, address, phone number and other details. It was pretty popular during Hudson Valley Restaurant Week in November 2014.

<b>LIVE DEMO:</b> http://data.lohud.com/foodieadventure

The code can be reused - with appropriate credit to me - to tailor it to your local Restaurant Week. It can also be used to create a site for folks just looking for new restaurants. Users continued to use the app even after Restaurant Week was over so the idea of having a restaurant chosen for them works for some people.

<b>Notes:</b> In the app, I only let users choose a county or counties to search. They can't search by city, type of food, price or any other variable. That is for multiple reasons:
1) The name is Foodie Adventure, emphasis on adventure. I didn't build it to be a restaurant search where choices can be narrowed by many categories. The idea is for folks to explore new places or to try something new at some place they may have never chosen themselves.
2) Allowing too many filters could effectively remove the random element. Some communities only have a few restaurants taking part in Restaurant Week so choosing by city could limit the utility of the app. Allowing choices by type of cuisine or price could be problematic for the same reason. (This is less of an issue for large metros like New York City or if you plan to repurpose it to be a general restaurant look-up).

I also include a data file in the 'data' folder that will let you recreate the table structure in MySQL and populate it with data so you can test. You, of course, will have to add your own connection file and add the link to your domain where indicated for the social sharing buttons. The restaurant data is provided courtesy of Valley Table Magazine, organizer of Hudson Valley Restaurant Week.

I built this app for a previous employer so I had to strip a bunch of code out and switch some things around to commit it here. I double-checked to ensure all of the necessary code is still there but if you find that something isn't working let me know, or feel free to fix.

If you have any questions, you can reach me at http://www.twitter.com/dwightsnews or http://www.dwightworley.net.

<b>CREDITS</b>
The social sharing buttons come from Social Likes - https://github.com/sapegin/social-likes
The data table uses the DataTables Jquery plugin - https://github.com/DataTables/DataTables
The icons in the app come from http://dakirby309.deviantart.com/art/Metro-UI-Icon-Set-725-Icons-280724102
