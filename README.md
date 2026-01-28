# Blogging

## Introduction
Basic web app for managing blogs, devaloped for the purpos of leaning Laravel.

## Front office
Consists of a home page wich hase all the posts, with search and categorys.
A page for the full post.

## Back office
The admin side:
- a dasboard for overview of the site
- 3 tables for managing  Users, Posts, and Categories

## Layouts and Componenets
2 different Componenets:
**admin** for the back office
**main** for the front office
### Layouts
these are the actuall pages, stuff that isent repeated

## Admin dashboard
**Utilises both Post and Category Controllers** 
The dashboard allowes for creating editing and deleating of **Categories** and **Posts**
## Index
**Managed by the SiteController**

Displays all the posts **paginated** to 3 per page, with the title, date, and description visible per post card.
**Category filter** on the side, clicking on one will display all the posts belonging to that category
