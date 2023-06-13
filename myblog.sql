-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2023 at 02:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'creator', 'creator'),
(2, 'hilmi', 'hilmi');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Send money online internationally via Paycle', 'Project Overview\r\nPaycle is one of my freelance UI Design projects on Upwork. I helped design a web app for transferring money abroad, focused on a student who wants to pay a college loan in the US\r\n\r\nThe challenge\r\nI had to translate my client request document into the design she desired. It was a tough job to do, seeing my client is a project manager, so not the actual client that needed the design. It was all a communication problem. But it was all ended well.', '2023-06-01 07:00:30'),
(2, 'Another WebApp freelance project', 'Project Overview\r\nInsight is one of my designs along with the Paycle project that I made for a client. Used almost the same design and layout as the Paycle with some modification', '2023-06-01 07:00:30'),
(3, 'The first time i collaborate for designing a dashboard design', 'Project Overview\r\nHere\'s one of a few preproposal projects I collaborate to make with my UI/UX Designer team when I conduct an Intern at a Software House Company called DOT Indonesia.\r\n\r\nThe Process\r\nWe were given a marvel prototype about what the client wants the app to look like, and then a spreadsheet filled with information about how this app works, etc.\r\nOn this occasion, our Team Design Lead made us (four UI/UX designer interns) as two teams that will design this app, so in the end, there will be two design styles to be presented at the proposal.\r\n\r\nChallenge\r\nHow to interpret the brief into a good design\r\n\r\nMy colleague and I spent a little time understanding the spreadsheet file, the flow, style and started digging inspiration before making the high fidelity design. It\'s quite a lot of screens we made because of how complex the sitemap of this app is, and not all of the screens I made myself, my colleague and I share the task 50/50, so here I will post a few screens that I made myself.', '2023-06-03 00:18:06'),
(4, 'Shelter is my solution for problems with online pet adoption.', 'Project Overview\r\nThis is the case study I made when I doing an intern at a Software House Company as a UI/UX Designer, the purpose of it is to learn how design thinking framework work.\r\n\r\nProblem Research\r\nI interviewed some friends about their buying and pet adopting experience during the pandemic. Some through chat and some participants from an online survey I made with Survey Monkey.\r\n\r\nThen I found the following information:\r\n\r\n- The number of respondents is seven people. Four boys and three girls\r\n- Four respondents are under 18 years old, two people are between 18 and 24 years old, and one person is between 25 and 34 years old.\r\n- All respondents have a desire to adopt a pet.\r\n- Respondents are interested in finding adoption info through the nearest pet shop, social media, relatives, and online stores.\r\n- Respondents experienced several difficulties: limited types of animals, the seller\'s location is far, taking a lot of time and effort, little information, and the shop\'s quality and the animal is not clear.\r\n- All respondents are more interested in buying pets online.\r\n\r\nUser Persona\r\nFurthermore, it is easier to determine our user scope and answer, \"Who am I making this application for?\" I created a User Persona \"card\" containing the target user profile for this problem.\r\n\r\nPain Points\r\nAfter being analyzed, several core problems experienced by users were found, namely:\r\n- Users have to find the location of the animal adoption shop and information about the opening and closing times of the shop, which are sometimes not written on the internet/newspapers.\r\n- The user does not know the store\'s quality, so there are doubts about the quality of the animals in each store.\r\n- The user says that some pet buying and selling applications mostly look uncomfortable, and sellers are quiet.\r\n- The user has to give up a lot of time and energy to go to the store one by one until there is a match.\r\n- User doesn\'t get the animals they want due to limited resources.\r\n\r\nAction Points\r\nThen, I change the Pain Point earlier into an Action Point in the form of questions about what I should do to deal with the various problems above. The Action Points I get are:\r\n- How do you get buyers to know firsthand all the pet shops in the surrounding area and information about the store without looking from other sources?\r\n- How can you make shoppers have no doubts about the quality of the animals in each store?\r\n- How to shorten the buyer\'s time in the pet buying process?\r\n- How do you get buyers to get the animals they want?\r\n- How to make this application crowded with users\r\n- How to make it easy and comfortable for users to use the application\r\n\r\nSolution\r\nAfter collecting various kinds of ideas, it was decided some of the most solution ideas, namely:\r\n- We make an online pet adoption application for smartphones. Not only that, I give features in the form of :\r\n- Included are reviews and ratings of buyers at the pet shop so that other buyers know the quality of each store.\r\n- There is a list of animals in each store that are ready for adoption, along with their characteristics.\r\n- There is a list of any pet shops in the surrounding area without having to search for too long.\r\n- Individual sellers can sell animals or their equipment for delivery, which can be delivered to the buyer\'s location.\r\n- Buyers can communicate via chat with buyers via the application.\r\n- Create user-friendly applications and easy to use\r\n- Presenting articles, news, and tips & tricks related to the pet world\r\n- Besides selling animals, shops or individuals can also sell animal needs, accessories, and equipment such as cages and food.\r\n\r\nUser Flow\r\nTo help map the user flow when using this application later and make it easier for users to achieve their goals, we created this application User flow. Here I use the whimsical.\r\n\r\nSketching\r\nHere I need paper and a pen to sketch what the design will look like. Explore as much as possible from various layouts to content hierarchies.\r\n\r\nMoodboard\r\nIt would be nice if I explore existing designs to add inspiration to the ideas of design styles, layouts, colours from our application later. Usually, I search on Dribble and Behance.\r\n\r\nUI Guideline\r\nThis is the step that determines the branding style of our application, from colours, typography, margin sizes, logos, etc. This makes it easier for us to be consistent in using resources and maintain the Branding DNA of our application.\r\n\r\nHigh Fidelity\r\nNext, I start visualizing the rough design into a Hi-Fi design. And from here later, I can consider our design to enter the production stage because I can say that our design is quite mature.\r\n\r\nUser Testing\r\nAt this stage, I validate the prototype earlier to our users, so I get an insight into whether the prototype is suitable and whether the user\'s problem is resolved correctly?\r\nI will do Usability Testing, where I will prepare several scenarios that the user needs to do with our prototype. Here I use a testing tool called Maze.\r\n\r\nTest Outcome\r\nSome users are still having problems using this application from the test results. I do a checkup on the path interaction that the user goes through. Then it was found that the user could not interact with one of the features, in this case, the filter feature.\r\nSo, what needs to be improved is the prototype. Also, try testing all the existing features for those who want to try Usability Testing. Because I also don\'t know which one the user will interact with, I can\'t force the user to do testing through the flow that I create, lets the user naturally use the prototype.\r\nFrom the prototype that I made, there are many paths that the user can take to achieve the goals of a testing scenario. You can see the user heatmap on how the result failed so that it is clear what the user interacts with, and I can also quickly inspect what needs improvement from our application prototype.\r\n\r\nConclusion\r\nYou can see that i use design thinking when building this case study. Design Thinking IMO is precious in solving problems because each stage of this method is mutually sustainable. I cannot proceed to the next step because I need to complete each step coherently. So for this Online Pet Adoption problem, I can find out and analyze the problem thoroughly because the stages that need to be passed are coherent and structured. As a result, I can understand the user\'s situation, identify the right solution, evaluate our solution, and achieve the goals.\r\nThank You! 🙌', '2023-06-03 03:31:38'),
(5, '10 Years On, BioShock Infinite Is Still A Great-Looking Hot Mess', 'You know I was there day one for Bioshock Infinite. In fact, it was the first time I pre-ordered a game, ever. And all these years later, like many others, I\'m still reckoning with the fallout of what actually released.\r\n\r\nIf you\'re just looking for a simple \'yay\' or \'nay\' answer, then you won\'t find it here. Time hasn\'t been kind to BioShock Infinite, as revealed by the shift in opinion towards it since its highly praised launch. Gone are the accolades, in their place is a wealth of scorn and criticism. That shift on Infinite over the years didn\'t come from nowhere either (though there are some, like our Rob Zak, who stand by the game through thick and thin).\r\n\r\nWhere most broken games have mindbogglingly absurd gameplay or some strange story that makes no sense, with Infinite it\'s so much more abstract, like trying to untangle gum from an aggravated sea urchin. Over time, the longer one has to assess Infinite, the less likely they are to be able to take it at that surface level. I know, because that was my experience. When I first played it, I had genuine fun, but something kept gnawing at me, so I went through again. Every couple of years after, whenever I was prompted to re-examine it again, that gnawing sense grew until I finally tried to put all the pieces together.', '2023-06-03 03:36:08'),
(6, 'Web Interface Guidelines: Interactivity', '- Clicking the input label should focus the input field\r\n- Inputs should be wrapped with a <form> to submit by pressing Enter\r\n- Inputs should have an appropriate type like password, email, etc\r\n- Inputs should disable spellcheck and autocomplete attributes most of the time\r\n- Inputs should leverage HTML form validation by using the required attribute when appropriate\r\n- Input prefix and suffix decorations, such as icons, should be absolutely positioned on top of the text input with padding, not next to it, and trigger focus on the input\r\n- Toggles should immediately take effect, not require confirmation\r\n- Buttons should be disabled after submission to avoid duplicate network requests\r\n- Interactive elements should disable user-select for inner content\r\n- Decorative elements (glows, gradients) should disable pointer-events to not hijack events\r\n', '2023-06-03 03:36:08'),
(7, 'Web Interface Guidelines: Part 2, Typography', '- Fonts should have -webkit-font-smoothing: antialiased applied for better legibility\r\n- Fonts should have text-rendering: optimizeLegibility applied for better legibility\r\n- Fonts should be subset based on the content, alphabet or relevant language(s)\r\n- Font weight should not change on hover or selected state to prevent layout shift\r\n- Font weights below 400 should not be used\r\n- Medium sized headings generally look best with a font weight between 500-600\r\n- Adjust values fluidly by using CSS clamp(), e.g. clamp(48px, 5vw, 72px) for the font-size of a heading', '2023-06-03 03:38:14'),
(8, 'Web Interface Guidelines: Part 3, Motion', '- Switching themes should not trigger transitions and animations on elements\r\n- Animation duration should not be more than 200ms for interactions to feel immediate\r\n- Animation values should be proportional to the trigger size:\r\n- Don\'t animate dialog scale in from 0 → 1, fade opacity and scale from ~0.8\r\n- Don\'t scale buttons on press from 1 → 0.8, but ~0.96, ~0.9, or so\r\n- Actions that are frequent and low in novelty should avoid extraneous animations:\r\n- Opening a right click menu\r\n- Deleting or adding items from a list\r\n- Hovering trivial buttons\r\n- Looping animations should pause when not visible on the screen to offload CPU and GPU usage', '2023-06-03 03:38:14'),
(9, 'Dummy post', 'what are you looking for?', '2023-06-03 03:55:42'),
(10, 'yet another dummy post..', '👀👀👀👀👀👀👀', '2023-06-03 03:55:42'),
(13, 'Post ini dibuat lewat tombol tambah', 'semoga berhasil', '2023-06-03 12:34:54'),
(15, 'thank god it works! 🙏', 'lorem ipsum yooo', '2023-06-03 17:27:47'),
(16, 'lets go! ✅', '🍋 🎑 📝', '2023-06-03 20:14:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
