-- Script for inserting test values in to the database:

-- Create values for the news outlets:
INSERT INTO `users` VALUES
(NULL, "Site Administator", "", "", "admin@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Art", "Arthur", "Kirkland", "kirkland@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Frank", "Francis", "Rayford", "rayford@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Henry", "Henry", "Fleming", "fleming@novascotialegalnews.ca", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "JayP", "Jay", "Porter", "jayp@gmail.com", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "DJ", "Dave", "Jameson", "dj@gmail.com", CURRENT_TIMESTAMP, TRUE, TRUE),
(NULL, "Windy", "Gail", "Packer", "windy12345@yahoo.com", CURRENT_TIMESTAMP, TRUE, TRUE);

INSERT INTO `administrators` VALUES
(NULL, 1);

INSERT INTO `moderators` VALUES
(NULL, 1),
(NULL, 2),
(NULL, 3);

INSERT INTO `outlets` VALUES
(NULL, "Small Claims Court of Nova Scotia"),
(NULL, "Provincial Court of Nova Scotia"),
(NULL, "Supreme Court of Nova Scotia");

-- Create values for the news articles:
INSERT INTO `articles` VALUES
(NULL, 1, "John Doe", "https://www.courts.ns.ca/", "This is Small Claims Court sample article 1",
"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pulvinar pellentesque habitant morbi tristique. At erat pellentesque adipiscing commodo elit at imperdiet. Tristique senectus et netus et malesuada. Tellus integer feugiat scelerisque varius morbi enim nunc faucibus. Tortor aliquam nulla facilisi cras fermentum odio. Diam quam nulla porttitor massa id. Dictumst quisque sagittis purus sit amet volutpat consequat. Eu turpis egestas pretium aenean pharetra magna. Imperdiet sed euismod nisi porta lorem mollis aliquam ut porttitor. Vitae nunc sed velit dignissim sodales ut. Vivamus arcu felis bibendum ut. Eget mi proin sed libero enim sed faucibus turpis. Gravida rutrum quisque non tellus orci ac. Nisl nisi scelerisque eu ultrices vitae. Molestie a iaculis at erat.
", CURRENT_TIMESTAMP),
(NULL, 1, "John Doe", "https://www.courts.ns.ca/", "This is Small Claims Court sample article 2",
"Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque. Elementum nibh tellus molestie nunc non blandit massa enim nec. Elementum tempus egestas sed sed risus. Pharetra diam sit amet nisl suscipit adipiscing. Morbi tristique senectus et netus et malesuada fames. Dolor magna eget est lorem ipsum dolor sit amet. Sed vulputate odio ut enim blandit volutpat maecenas volutpat. Arcu risus quis varius quam. Felis imperdiet proin fermentum leo vel orci porta. Dignissim enim sit amet venenatis.
", CURRENT_TIMESTAMP),
(NULL, 1, "John Doe", "https://www.courts.ns.ca/", "This is Small Claims Court sample article 3",
"Eget est lorem ipsum dolor sit amet consectetur. Orci nulla pellentesque dignissim enim sit. A diam sollicitudin tempor id eu nisl nunc mi. Interdum consectetur libero id faucibus nisl. Egestas sed sed risus pretium. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Et pharetra pharetra massa massa ultricies mi quis hendrerit. Nisl condimentum id venenatis a condimentum vitae sapien. Arcu risus quis varius quam quisque id diam vel. Volutpat odio facilisis mauris sit amet massa vitae tortor. Pharetra sit amet aliquam id diam maecenas. Sed odio morbi quis commodo.
", CURRENT_TIMESTAMP),
(NULL, 2, "Jane Doe", "https://www.courts.ns.ca/", "This is Provincial Court sample article 1",
"Quam vulputate dignissim suspendisse in est ante in nibh. Sit amet venenatis urna cursus eget nunc scelerisque. At tellus at urna condimentum mattis. Porttitor leo a diam sollicitudin tempor id. Purus gravida quis blandit turpis. Massa sed elementum tempus egestas sed sed. Volutpat est velit egestas dui id ornare arcu odio. Ultricies leo integer malesuada nunc vel. Rhoncus urna neque viverra justo nec ultrices dui sapien eget. Fames ac turpis egestas integer eget. Porttitor massa id neque aliquam vestibulum.
", CURRENT_TIMESTAMP),
(NULL, 2, "Jane Doe", "https://www.courts.ns.ca/", "This is Provincial Court sample article 2",
"Vitae tortor condimentum lacinia quis vel eros donec ac odio. Ut aliquam purus sit amet luctus venenatis lectus. Pretium lectus quam id leo. Eget nullam non nisi est sit amet facilisis magna. Odio morbi quis commodo odio aenean sed adipiscing diam. Lectus arcu bibendum at varius vel pharetra vel turpis nunc. Amet mauris commodo quis imperdiet massa tincidunt nunc. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Vitae nunc sed velit dignissim sodales ut eu sem integer. Amet est placerat in egestas erat. Dignissim suspendisse in est ante in nibh. Ornare suspendisse sed nisi lacus sed.
", CURRENT_TIMESTAMP),
(NULL, 2, "Jane Doe", "https://www.courts.ns.ca/", "This is Provincial Court sample article 3",
"Lobortis feugiat vivamus at augue eget arcu dictum. Odio ut sem nulla pharetra diam sit. Nisl tincidunt eget nullam non nisi. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Et netus et malesuada fames ac turpis. Id leo in vitae turpis massa. Velit dignissim sodales ut eu sem integer vitae justo. Vulputate sapien nec sagittis aliquam malesuada. Aliquam eleifend mi in nulla posuere sollicitudin. Mi proin sed libero enim sed faucibus turpis. Suspendisse potenti nullam ac tortor vitae purus faucibus.
", CURRENT_TIMESTAMP),
(NULL, 3, "Joe Doe", "https://www.courts.ns.ca/", "This is Supreme Court sample article 1",
"Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Faucibus purus in massa tempor nec feugiat nisl pretium. Placerat orci nulla pellentesque dignissim. Tempor id eu nisl nunc. Eget nulla facilisi etiam dignissim diam quis enim. Cursus eget nunc scelerisque viverra mauris in aliquam. Id faucibus nisl tincidunt eget. Tincidunt id aliquet risus feugiat in ante. Ut morbi tincidunt augue interdum velit euismod in. Urna porttitor rhoncus dolor purus. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices gravida. Massa id neque aliquam vestibulum morbi blandit cursus. Elementum facilisis leo vel fringilla. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim enim. Morbi tristique senectus et netus et. Dictumst vestibulum rhoncus est pellentesque elit. Et molestie ac feugiat sed. Molestie a iaculis at erat pellentesque.
", CURRENT_TIMESTAMP),
(NULL, 3, "Joe Doe", "https://www.courts.ns.ca/", "This is Supreme Court sample article 2",
"Et molestie ac feugiat sed lectus. Blandit libero volutpat sed cras. Accumsan in nisl nisi scelerisque eu. Fermentum dui faucibus in ornare quam. Scelerisque eu ultrices vitae auctor eu augue ut lectus. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Sit amet risus nullam eget. Convallis posuere morbi leo urna molestie at elementum eu facilisis. Pellentesque adipiscing commodo elit at imperdiet dui. Nisi vitae suscipit tellus mauris a diam maecenas sed. Enim eu turpis egestas pretium aenean pharetra magna ac. Donec massa sapien faucibus et molestie. Nunc non blandit massa enim. Neque egestas congue quisque egestas diam in.
",CURRENT_TIMESTAMP),
(NULL, 3, "Joe Doe", "https://www.courts.ns.ca/", "This is Supreme Court sample article 3",
"Enim tortor at auctor urna nunc id cursus metus. Ut sem nulla pharetra diam sit amet nisl. Id porta nibh venenatis cras sed felis eget. Adipiscing commodo elit at imperdiet dui accumsan sit amet nulla. Eu volutpat odio facilisis mauris sit. In fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Tellus mauris a diam maecenas sed enim ut sem. Lacinia at quis risus sed vulputate odio ut. Sem fringilla ut morbi tincidunt augue interdum. Ultrices dui sapien eget mi proin. Iaculis at erat pellentesque adipiscing commodo elit.
", CURRENT_TIMESTAMP);

INSERT INTO `articleReactions` VALUES
(NULL, "LIKE", 1, 1),
(NULL, "LIKE", 2, 1),
(NULL, "LIKE", 3, 1),
(NULL, "DISLIKE", 4, 8),
(NULL, "DISLIKE", 5, 8),
(NULL, "LIKE", 6, 9);

INSERT INTO `articleComments` VALUES
(NULL, "This is a great story!", 1, 1),
(NULL, "I really like this story!", 2, 1),
(NULL, "Excellent writing!", 3, 1),
(NULL, "Not sure about this one!", 4, 8),
(NULL, "Me neither!", 5, 8);

INSERT INTO `commentReactions` VALUES
(NULL, "LIKE", 1, 2),
(NULL, "LIKE", 1, 3),
(NULL, "LIKE", 2, 1),
(NULL, "LIKE", 2, 3),
(NULL, "DISLIKE", 3, 4);

INSERT INTO `usersFollowsOutlets` VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 2),
(5, 3),
(6, 2),
(7, 1);

INSERT INTO `usersFollowsUsers` VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 6),
(4, 7),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1);