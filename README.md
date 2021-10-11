### Nova Scotia Court News Website
--- 
### Contributors:

- Adam Melvin 
- Liam Osler 
- Sarah Pollock-Jordan
- Rachel Woodside
---

### Website goals: 

- Aggregate rulings from the Courts of Nova Scotia, present them in an accessible and easy to read fashion for users from a broad range of demographics.
- Index page "newsfeed" that aggregates sources such as the Courts of Nova Scotia's RSS Feed, CanLII's Nova Scotia RSS Feeds and other local news outlets for stories relevant to the court rulings and legislation in Nova Scotia.
- Means for users to add comments and/or reactions to the content on the Index page.
- Means for users to "follow" a certain topic, ruling, user, or other items.
- Provide a forum for discussions about Nova Scotia court rulings, legislation and legal affairs.

---

### Website Users: 

- #### Administrators:
    - Elevated user privileges
    - Manages other user accounts
    - Manages moderators and users
    
- #### Moderators:
    - Moderates discussion boards
        - May hide content as deemed appropriate by the terms of acceptable behaviour outlined in the user agreement to terms and conditions.

- #### Registered users (general users or not yet verified users):
    - Anyone can register for account
        - Must agree to terms and conditions during registration
        - User can upload a profile picture that creates their user icon
    - Can follow a topic or a ruling
    - Has a userpage that displays the user's activity feed
        - Items the user has commented on
        - Items the user has reacted to
        - Activity feed can be set to public/private according to user preference 

- #### Verified users (Law professionals, politicians, journalists, etc.)
    - Must be verified by the website (akin to Twitter verification)
        - User icon shows a verification symbol
        - Same features as registered users, but may also publish opinion pieces/articles/announcements 

---

### Technology Stack:
- PHP
- MySQL
- JavaScript
- CSS

### Project Structure:
```R
.
├── db
│   ├── db.php
│   └── functions.php
├── inc
│   ├── components
│   │   ├── latestnews.php
│   │   └── login.php
│   ├── footer.php
│   └── header.php
├── styles
│   └── main.css
├── about.php
├── index.php
└── users.php
```

