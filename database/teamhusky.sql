-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 07:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamhusky`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) UNSIGNED NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `author` (`author_id`) VALUES
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) UNSIGNED NOT NULL,
  `paper_id` int(11) UNSIGNED DEFAULT NULL,
  `reviewer_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `bids` (`bid_id`, `paper_id`, `reviewer_id`) VALUES
(	1	,	101	,	76	),
(	2	,	102	,	77	),
(	3	,	103	,	78	),
(	4	,	104	,	79	),
(	5	,	105	,	80	),
(	6	,	106	,	81	),
(	7	,	107	,	82	),
(	8	,	108	,	83	),
(	9	,	109	,	84	),
(	10	,	110	,	85	),
(	11	,	111	,	86	),
(	12	,	112	,	87	),
(	13	,	113	,	88	),
(	14	,	114	,	89	),
(	15	,	115	,	90	),
(	16	,	116	,	91	),
(	17	,	117	,	92	),
(	18	,	118	,	93	),
(	19	,	119	,	94	),
(	20	,	120	,	95	),
(	21	,	121	,	96	),
(	22	,	122	,	97	),
(	23	,	123	,	98	),
(	24	,	124	,	99	),
(	25	,	125	,	100	),
(	26	,	126	,	76	),
(	27	,	127	,	77	),
(	28	,	128	,	78	),
(	29	,	129	,	79	),
(	30	,	130	,	80	),
(	31	,	131	,	81	),
(	32	,	132	,	82	),
(	33	,	133	,	83	),
(	34	,	134	,	84	),
(	35	,	135	,	85	),
(	36	,	136	,	86	),
(	37	,	137	,	87	),
(	38	,	138	,	88	),
(	39	,	139	,	89	),
(	40	,	140	,	90	),
(	41	,	141	,	91	),
(	42	,	142	,	92	),
(	43	,	143	,	93	),
(	44	,	144	,	94	),
(	45	,	145	,	95	),
(	46	,	146	,	96	),
(	47	,	147	,	97	),
(	48	,	148	,	98	),
(	49	,	149	,	99	),
(	50	,	150	,	100	),
(	51	,	151	,	76	),
(	52	,	152	,	77	),
(	53	,	153	,	78	),
(	54	,	154	,	79	),
(	55	,	155	,	80	),
(	56	,	156	,	81	),
(	57	,	157	,	82	),
(	58	,	158	,	83	),
(	59	,	159	,	84	),
(	60	,	160	,	85	),
(	61	,	161	,	86	),
(	62	,	162	,	87	),
(	63	,	163	,	88	),
(	64	,	164	,	89	),
(	65	,	165	,	90	),
(	66	,	166	,	91	),
(	67	,	167	,	92	),
(	68	,	168	,	93	),
(	69	,	169	,	94	),
(	70	,	170	,	95	),
(	71	,	171	,	96	),
(	72	,	172	,	97	),
(	73	,	173	,	98	),
(	74	,	174	,	99	),
(	75	,	175	,	100	),
(	76	,	176	,	76	),
(	77	,	177	,	77	),
(	78	,	178	,	78	),
(	79	,	179	,	79	),
(	80	,	180	,	80	),
(	81	,	181	,	81	),
(	82	,	182	,	82	),
(	83	,	183	,	83	),
(	84	,	184	,	84	),
(	85	,	185	,	85	),
(	86	,	186	,	86	),
(	87	,	187	,	87	),
(	88	,	188	,	88	),
(	89	,	189	,	89	),
(	90	,	190	,	90	),
(	91	,	191	,	91	),
(	92	,	192	,	92	),
(	93	,	193	,	93	),
(	94	,	194	,	94	),
(	95	,	195	,	95	),
(	96	,	196	,	96	),
(	97	,	197	,	97	),
(	98	,	198	,	98	),
(	99	,	199	,	99	),
(	100	,	200	,	100	);



-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) UNSIGNED NOT NULL,
  `commenter_id` int(11) UNSIGNED NOT NULL,
  `review_id` int(11) UNSIGNED NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `comments` (`comment_id`, `commenter_id`, `review_id`, `comment`) VALUES
(1, 76, 1, 'ok'),
(2, 77, 2, 'bad'),
(3, 78, 3, 'good'),
(4, 79, 4, 'superb'),
(5, 80, 5, 'decent'),
(6, 81, 6, 'well done'),
(7, 82, 7, 'meh'),
(8, 83, 8, 'good'),
(9, 84, 9, 'splendid'),
(10, 85, 10, 'correct'),
(11, 86, 11, 'super'),
(12, 87, 12, 'bad'),
(13, 88, 13, 'fair'),
(14, 89, 14, 'nope'),
(15, 90, 15, 'bad'),
(16, 91, 16, 'understandable'),
(17, 92, 17, 'solid'),
(18, 93, 18, 'nice work'),
(19, 94, 19, 'ok'),
(20, 95, 20, 'ok'),
(21, 96, 21, 'checked'),
(22, 97, 22, 'marked'),
(23, 98, 23, 'yup'),
(24, 99, 24, 'agreed'),
(25, 100, 25, 'nice'),
(26, 76, 26, 'good'),
(27, 77, 27, 'best'),
(28, 78, 28, 'okay'),
(29, 79, 29, 'exactly'),
(30, 80, 30, 'nice'),
(31, 81, 31, 'meh'),
(32, 82, 32, 'yup'),
(33, 83, 33, 'skin of your teeth'),
(34, 84, 34, 'why?'),
(35, 85, 35, 'right'),
(36, 86, 36, 'not good'),
(37, 87, 37, 'inconclusive'),
(38, 88, 38, 'incomplete'),
(39, 89, 39, 'i cannot understand'),
(40, 90, 40, 'not complete'),
(41, 91, 41, 'okay'),
(42, 92, 42, 'acceptable'),
(43, 93, 43, 'nice one'),
(44, 94, 44, 'right on point'),
(45, 95, 45, 'not good'),
(46, 96, 46, 'please rewrite'),
(47, 97, 47, 'why not?'),
(48, 98, 48, 'general idea is there'),
(49, 99, 49, 'decent' ),
(50, 100, 50, 'good work'),
(51, 76, 51, 'work of art'),
(52, 77, 52, 'not the best'),
(53, 78, 53, 'can do better'),
(54, 79, 54, 'can do better than that'),
(55, 80, 55, 'what is this?'),
(56, 81, 56, 'not on point'),
(57, 82, 57, 'not so good'),
(58, 83, 58, 'not good at all'),
(59, 84, 59, 'false'),
(60, 85, 60, 'true'),
(61, 86, 61, 'so true'),
(62, 87, 62, 'very true'),
(63, 88, 63, 'not true'),
(64, 89, 64, 'not all of it is true'),
(65, 90, 65, 'okay'),
(66, 91, 66, 'meh'),
(67, 92, 67, 'decent'),
(68, 93, 68, 'covered everything'),
(69, 94, 69, 'not complete'),
(70, 95, 70, 'does not strike me' ),
(71, 96, 71, 'not impactful enough'),
(72, 97, 72, 'wrong'),
(73, 98, 73, 'right'),
(74, 99, 74, 'correct'),
(75, 100, 75, 'nope'),
(76, 76, 76, 'no point'),
(77, 77, 77, 'not answering'),
(78, 78, 78, 'outlook not so good'),
(79, 79, 79, 'not really that good'),
(80, 80, 80, 'well done'),
(81, 81, 81, 'splendid'),
(82, 82, 82, 'wonderful'),
(83, 83, 83, 'outstanding'),
(84, 84, 84, 'keep going'),
(85, 85, 85, 'please try again'),
(86, 86, 86, 'incorrect'),
(87, 87, 87, 'not correct'),
(88, 88, 88, 'not right, not wrong'),
(89, 89, 89, 'not nice'),
(90, 90, 90, 'false'),
(91, 91, 91, 'lies'),
(92, 92, 92, 'nope'),
(93, 93, 93, 'work of art'),
(94, 94, 94, 'nice job'),
(95, 95, 95, 'good attempt'),
(96, 96, 96, 'nice try'),
(97, 97, 97, 'fair'),
(98, 98, 98, 'not so great'),
(99, 99, 99, 'great'),
(100, 100, 100, 'finally');


-- --------------------------------------------------------

--
-- Table structure for table `conference_chairman`
--

CREATE TABLE `conference_chairman` (
  `chairman_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `conference_chairman` (`chairman_id`) VALUES
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50);



-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` int(11) UNSIGNED NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `reviewer_id` int(11) UNSIGNED DEFAULT NULL,
  `review_id` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `paper_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `papers` (`paper_id`, `author_id`,`reviewer_id`, `review_id`, `title`, `content`,`paper_status`) VALUES
(101, 51, 76, 1,'Studying 101: 26 Steps To Success', 'Of course, in one sense, the first essential for a mans being a good citizen is his possession of the home virtues of which we think when we call a man by the emphatic adjective of manly. ','Accepted'),
(102, 52, 77, 2,'Tactics That Will Increase Your Revenue By 26% In 2022','No man can be a good citizen who is not a good husband and a good father, who is not honest in his dealings with other men and women, faithful to his friends and fearless in the presence of his foes, who has not got a sound heart, a sound mind, and a sound body; exactly as no amount of attention to civil duties will save a nation if the domestic life is undermined, or there is lack of the rude military virtues which alone can assure a countrys position in the world.','Accepted'),
(103, 53, 78, 3,'We Asked 11 programming Experts. Here is What We Found','In a free republic the ideal citizen must be one willing and able to take arms for the defense of the flag, exactly as the ideal citizen must be the father of many healthy children.','Rejected'),
(104, 54, 79, 4,'programming: The Definitive Guide','A race must be strong and vigorous; it must be a race of good fighters and good breeders, else its wisdom will come to naught and its virtue be ineffective; and no sweetness and delicacy, no love for and appreciation of beauty in art or literature, no capacity for building up material prosperity can possibly atone for the lack of the great virile virtues.','Reviewed'),
(105, 55, 80, 5,'Best 27 studying Ways For 2022', 'But this is aside from my subject, for what I wish to talk of is the attitude of the American citizen in civic life.','Accepted'),
(106, 56, 81, 6,'5 Shocking Ways About drinking alcohol','It ought to be axiomatic in this country that every man must devote a reasonable share of his time to doing his duty in the Political life of the community.','Pending Review'),
(107, 57, 82, 7,'Studying: Step By Step Guide', 'No man has a right to shirk his political duties under whatever plea of pleasure or business; and while such shirking may be pardoned in those of small cleans it is entirely unpardonable in those among whom it is most common--in the people whose circumstances give them freedom in the struggle for life.','Accepted'),
(108, 58, 83, 8,'19 Mind-Blowing Tactics About Shaun the sheep','In so far as the community grows to think rightly, it will likewise grow to regard the young man of means who shirks his duty to the State in time of peace as being only one degree worse than the man who thus shirks it in time of war.','Rejected'),
(109, 59, 84, 9,'Alert! Are You Doing Mistakes like Grace?', 'A great many of our men in business, or of our young men who are bent on enjoying life (as they have a perfect right to do if only they do not sacrifice other things to enjoyment), rather plume themselves upon being good citizens if they even vote; yet voting is the very least of their duties, Nothing worth gaining is ever gained without effort.','Rejected'),
(110, 60, 85,10,'What You Should Know About Jordan In 2022', 'You can no more have freedom without striving and suffering for it than you can win success as a banker or a lawyer without labor and effort, without self-denial in youth and the display of a ready and alert intelligence in middle age.','Rejected'),
(111, 61, 86,11,'Terrific Tricks Ivan knows For 2022', 'The people who say that they have not time to attend to politics are simply saying that they are unfit to live in a free community.','Rejected'),
(112, 62, 87,12,'How To Choose A good friend like Jia Hao','I have, myself, full confidence that if all do their duty, if nothing is neglected, and if the best arrangements are made, as they are being made, we shall prove ourselves once again able to defend our Island home, to ride out the storm of war, and to outlive the menace of tyranny, if necessary for years, if necessary alone.','Rejected'),
(113, 63, 88,13,'15 Smart Tools To Simplify Zongyi','At any rate, that is what we are going to try to do. That is the resolve of His Majestys Government-every man of them. That is the will of Parliament and the nation.','Rejected'),
(114, 64, 89,14,'The Ultimate Guide To Ivan','The British Empire and the French Republic, linked together in their cause and in their need, will defend to the death their native soil, aiding each other like good comrades to the utmost of their strength. ','Rejected'),
(115, 65, 90,15,'29 Weird Ways To Increase Your life expectancy','We shall go on to the end, we shall fight in France, we shall fight on the seas and oceans, we shall fight with growing confidence and growing strength in the air, we shall defend our Island, whatever the cost may be, we shall fight on the beaches, we shall fight on the landing grounds, we shall fight in the fields and in the streets, we shall fight in the hills.','Accepted'),
(116, 66, 91,16,'Programming : Step By Step Guide','It is this fate, I solemnly assure you, that I dread for you, when the time comes that you make your reckoning, and realize that there is no longer anything that can be done.','Pending Review'),
(117, 67, 92,17,'29 Mistakes Most careless mistakes beginners Often Commit (And How To Avoid Them)','Cathargo Delenda Est!','Pending Review'),
(118, 68, 93,18,'29 Useful Facts About Shaun','May you never find yourselves, men of Athens, in such a position!','Rejected'),
(119, 69, 94,19,'24 Lies To Avoid About Grace','Yet in any case, it were better to die ten thousand deaths, than to do anything out of servility towards Philip [or to sacrifice any of those who speak for your good].','Rejected'),
(120, 70, 95,20,'Jordan 101: Everything You Wanted To Know','A noble recompense did the people in Oreus receive, for entrusting themselves to Philips friends, and thrusting Euphraeus aside!','Rejected'),
(121, 71, 96,21,'26 Best Shaun Secrets For 2022','And a noble recompense the democracy of Eretria, for driving away your envoys, and surrendering to Cleitarchus!','Rejected'),
(122, 72, 97,22,'Everything You Need To Know About Grace','They are slaves, scourged and butchered!','Rejected'),
(123, 73, 98,23,'Data-Driven Jiahao Tricks For 2022','A noble clemency did he show to the Olynthians, who elected Lasthenes to command the cavalry, and banished Apollonides!','Rejected'),
(124, 74, 99,24,'Here is How I bullied Grace In 2022 (for Jiahao)','Can we forge against these enemies a grand and global alliance, North and South, East and West, that can assure a more fruitful life for all mankind? Will you join in that historic effort?','Rejected'),
(125, 75, 100,25,'I Spent $29 Every Day On gasoline For 17 Weeks (And Here is What Happened)','In the long history of the world, only a few generations have been granted the role of defending freedom in its hour of maximum danger. I do not shrink from this responsibility -- I welcome it.','Accepted'),
(126, 51, 76,26,'I Spent $87 Every Day On more gasoline For 29 Weeks (And Here is What Happened)','I do not believe that any of us would exchange places with any other people or any other generation.','Accepted'),
(127, 52, 77,27,'14 Reasons Why your bank account Is Going To Be BIG In 2022','The energy, the faith, the devotion which we bring to this endeavor will light our country and all who serve it -- and the glow from that fire can truly light the world.','Accepted'),
(128, 53, 78,28,'The Future Of Singapore In 2022 (And Why You Should Pay Attention)','And so, my fellow Americans: ask not what your country can do for you -- ask what you can do for your country.','Pending Review'),
(129, 54, 79,29,'10 Mistakes Most Beginners Often Commit (And How To Avoid Them)','My fellow citizens of the world: ask not what America will do for you, but what together we can do for the freedom of man.','Accepted'),
(130, 55, 80,30,'Top 5 Hacks To Become A hacker Expert Today','Weve grown used to wonders in this century. Its hard to dazzle us. But for 25 years the United States space program has been doing just that. Weve grown used to the idea of space, and perhaps we forget that weve only just begun.','Accepted'),
(131, 56, 81,31,'13 Shocking Tricks About Christmas','Were still pioneers. They, the members of the Challenger crew, were pioneers.','Pending Review'),
(132, 57, 82,32,'16 Top Things For Effortless sleep','And I want to say something to the school children of America who were watching the live coverage of the shuttles takeoff.','Accepted'),
(133, 58, 83,33,'Are You Ready To sleep? Here is How','I know it is hard to understand, but sometimes painful things like this happen.','Pending Review'),
(134, 59, 84,34,'20 Guaranteed Ways To Make life Easier For You','The crew of the space shuttle Challenger honoured us by the manner in which they lived their lives. We will never forget them, nor the last time we saw them, this morning, as they prepared for the journey and waved goodbye and slipped the surly bonds of earth to touch the face of God.','Accepted'),
(135, 60, 85,35,'11 Shocking Tricks About Chinese new year','But has the last word been said? Must hope disappear? Is defeat final? No!','Pending Review'),
(136, 61, 86,36,'Best 23 cursing Tips For 2022','Believe me, I who am speaking to you with full knowledge of the facts, and who tell you that nothing is lost for France. The same means that overcame us can bring us victory one day. For France is not alone! She is not alone! She is not alone! She has a vast Empire behind her. She can align with the British Empire that holds the sea and continues the fight. She can, like England, use without limit the immense industry of the United States.','Rejected'),
(137, 62, 87,37,'The Future Of Shaun In 2022 (And Why You Should Pay Attention)','This war is not limited to the unfortunate territory of our country. This war is not over as a result of the Battle of France. This war is a worldwide war. All the mistakes, all the delays, all the suffering, do not alter the fact that there are, in the world, all the means necessary to crush our enemies one day. Vanquished today by mechanical force, in the future we will be able to overcome by a superior mechanical force. The fate of the world depends on it.','Rejected'),
(138, 63, 88,38,'Funny Things That Will Increase Your Revenue By 10% In 2022','Some one will say: Yes, Socrates, but cannot you hold your tongue, and then you may go into a foreign city, and no one will interfere with you? Now I have great difficulty in making you understand my answer to this. For if I tell you that to do as you say would be a disobedience to the God, and therefore that I cannot hold my tongue, you will not believe that I am serious; and if I say again that daily to discourse about virtue, and of those other things about which you hear me examining myself and others, is the greatest good of man, and that the unexamined life is not worth living, you are still less likely to believe me.','Accepted'),
(139, 64, 89,39,'21 Weird Ways To Increase Your chances','While I repeat my obligations to the Army in general, I should do injustice to my own feelings not to acknowledge in this place the peculiar Services and distinguished merits of the Gentlemen who have been attached to my person during the War. It was impossible the choice of confidential Officers to compose my family should have been more fortunate. Permit me Sir, to recommend in particular those, who have continued in Service to the present moment, as worthy of the favorable notice and patronage of Congress.','Accepted'),
(140, 65, 90,40,'22 Myths About Jiahao You Probably Still Believe','What General Weygand called the Battle of France is over.','Rejected'),
(141, 66, 91,41,'What You Should Know About Jordan In 2022','I expect that the Battle of Britain is about to begin. Upon this battle depends the survival of Christian civilization.','Rejected'),
(142, 67, 92,42,'11 Weird Ways To Increase Your life expectancy','Upon it depends our own British life, and the long continuity of our institutions and our Empire. The whole fury and might of the enemy must very soon be turned on us.','Accepted'),
(143, 68, 93,43,'Top 16 Tricks To Become A procrastination Expert Today','Hitler knows that he will have to break us in this Island or lose the war. If we can stand up to him, all Europe may be free and the life of the world may move forward into broad, sunlit uplands.','Accepted'),
(144, 69, 94,44,'27 Top Tips For Effortless studying','But if we fail, then the whole world, including the United States, including all that we have known and cared for, will sink into the abyss of a new Dark Age made more sinister, and perhaps more protracted, by the lights of perverted science.','Accepted'),
(145, 70, 95,45,'How I Turned Out To Be A Procrastination Specialist','Let us therefore brace ourselves to our duties, and so bear ourselves that if the British Empire and its Commonwealth last for a thousand years, men will still say, This was their finest hour.','Accepted'),
(146, 71, 96,46,'Laziness : The Definitive Guide','In the councils of government, we must guard against the acquisition of unwarranted influence, whether sought or unsought, by the military-industrial complex. The potential for the disastrous rise of misplaced power exists and will persist.','Accepted'),
(147, 72, 97,47,'9 Reasons Why You Shouldn not Worry About exams Again','We must never let the weight of this combination endanger our liberties or democratic processes.','Reviewed'),
(148, 73, 98,48,'23 Best sleep Tips For Success','We should take nothing for granted. Only an alert and knowledgeable citizenry can compel the proper meshing of the huge industrial and military machinery of defense with our peaceful methods and goals, so that security and liberty may prosper together.','Reviewed'),
(149, 74, 99,49,'The Truth Behind Grace','I wish, O conscript fathers, to be merciful; I wish not to appear negligent amid such danger to the state; but I do now accuse myself of remissness and culpable inactivity.' ,'Rejected'),
(150, 75, 100,50,'6 Ways You Can Master Mervin','A camp is pitched in Italy, at the entrance of Etruria, in hostility to the republic; the number of the enemy increases every day; and yet the general of that camp, the leader of those enemies, we see within the walls-aye, and even in the senate-planning every day some internal injury to the republic.','Rejected'),
(151, 51, 76,51,'11 Lies To Avoid About Sheep','So died these men as became Athenians.','Accepted'),
(152, 52, 77,52,'How To Choose A good 314 team','I am closing my 52 years of military service. When I joined the Army, even before the turn of the century, it was the fulfillment of all of my boyish hopes and dreams. The world has turned over many times since I took the oath on the plain at West Point, and the hopes and dreams have long since vanished, but I still remember the refrain of one of the most popular barrack ballads of that day which proclaimed most proudly that "old soldiers never die; they just fade away."','Accepted'),
(153, 53, 78,53,'The Experts Guide To sleep on time','And like the old soldier of that ballad, I now close my military career and just fade away, an old soldier who tried to do his duty as God gave him the light to see that duty.','Accepted'),
(154, 54, 79,54,'You Think You Know What studying Is? Test Yourself','Fondly do we hope, fervently do we pray, that this mighty scourge of war may speedily pass away. Yet, if God wills that it continue until all the wealth piled by the bondsmans two hundred and fifty years of unrequited toil shall be sunk, and until every drop of blood drawn with the lash shall be paid by another drawn with the sword, as was said three thousand years ago, so still it must be said "the judgments of the Lord are true and righteous altogether."','Accepted'),
(155, 55, 80,55,'Powerful sleep Tricks For 2022','The battle, sir, is not to the strong alone; it is to the vigilant, the active, the brave. Besides, sir, we have no election. If we were base enough to desire it, it is now too late to retire from the contest. There is no retreat but in submission and slavery! Our chains are forged! Their clanking may be heard on the plains of Boston! The war is inevitable -- and let it come! I repeat it, sir, let it come!','Accepted'),
(156, 56, 81,56,'27 Epic study Secrets For 2022','It is in vain, sir, to extenuate the matter. Gentlemen may cry, "Peace! Peace!" -- but there is no peace. The war is actually begun! The next gale that sweeps from the north will bring to our ears the clash of resounding arms! Our brethren are already in the field! Why stand we here idle? What is it that gentlemen wish? What would they have? Is life so dear, or peace so sweet, as to be purchased at the price of chains and slavery? Forbid it, Almighty God! I know not what course others may take; but as for me, give me liberty, or give me death!','Accepted'),
(157, 57, 82,57,'29 Fool-Proof Secrets That Work For Fools','These are the boys of Pointe du Hoc. These are the men who took the cliffs. These are the champions who helped free a continent. These are the heroes who helped end a war.','Pending Review'),
(158, 58, 83,58,'How To Deal With sequence diagrams','Gentlemen, I look at you and I think of the words of Stephen Spenders poem. You are men who in your lives fought for life...and left the vivid air signed with your honor...','Accepted'),
(159, 59, 84,59,'24 Simple Steps To Master CSIT314','Forty summers have passed since the battle that you fought here. You were young the day you took these cliffs; some of you were hardly more than boys, with the deepest joys of life before you.','Accepted'),
(160, 60, 85,60,'17 Top Things For Effortless sleep','Yet you risked everything here. Why? Why did you do it? What impelled you to put aside the instinct for self-preservation and risk your lives to take these cliffs? What inspired all the men of the armies that met here?','Accepted'),
(161, 61, 86,61,'Top 10 Facts Behind sequence diagrams','We look at you, and somehow we know the answer. It was faith, and belief; it was loyalty and love.','Accepted'),
(162, 62, 87,62,'Best 5 procrastination Strategies For 2022','The men of Normandy had faith that what they were doing was right, faith that they fought for all humanity, faith that a just God would grant them mercy on this beachhead or on the next. It was the deep knowledge -- and pray God we have not lost it -- that there is a profound moral difference between the use of force for liberation and the use of force for conquest. You were here to liberate, not to conquer, and so you and those others did not doubt your cause. And you were right not to doubt.','Accepted'),
(163, 63, 88,63,'15 Ways To Totally Change Your Jiahao','I say to the House as I said to ministers who have joined this government, I have nothing to offer but blood, toil, tears, and sweat. We have before us an ordeal of the most grievous kind. We have before us many, many months of struggle and suffering.','Rejected'),
(164, 64, 89,64,'8 Amazing Facts About Mervin','You ask, what is our policy? I say it is to wage war by land, sea, and air. War with all our might and with all the strength God has given us, and to wage war against a monstrous tyranny never surpassed in the dark and lamentable catalogue of human crime. That is our policy.','Rejected'),
(165, 65, 90,65,'19 Ways You Can Master CSIT314','You ask, what is our aim? I can answer in one word. It is victory. Victory at all costs - Victory in spite of all terrors - Victory, however long and hard the road may be, for without victory there is no survival.','Accepted'),
(166, 66, 91,66,'16 Smart Tools To Simplify Shaun','Mr. Vice President, Mr. Speaker, members of the Senate and the House of Representatives: yesterday, December 7, 1941-a date which will live in infamy-the United States of America was suddenly and deliberately attacked by naval and air forces of the Empire of Japan.....','Rejected'),
(167, 67, 92,67,'How To Do my project? 22 Promising Things For Doing nothing','But always will our whole nation remember the character of the onslaught against us. No matter how long it may take us to overcome this premeditated invasion, the American people in their righteous might will win through to absolute victory.','Accepted'),
(168, 68, 93,68,'CSIT314 Resolved In Just 21 Steps','I believe that I interpret the will of the Congress and of the people when I assert that we will not only defend ourselves to the uttermost but will make it very certain that this form of treachery shall never again endanger us.','Accepted'),
(169, 69, 94,69,'Are You Ready To 2023? Here is How','Hostilities exist. There is no blinking at the fact that our people, our territory and our interests are in grave danger.','Accepted'),
(170, 70, 95,70,'Are You Ready To graduation? Here is How','With confidence in our armed forces-with the unbounding determination of our people-we will gain the inevitable triumph-so help us God.', 'Accepted'),
(171, 71, 96,71,'How To Deal With Jiahao','Blessed are the poor in spirit: for theirs is the kingdom of heaven.','Rejected'),
(172, 72, 97,72,'CSIT314: The Ultimate Things List','Blessed are they that mourn: for they shall be comforted.','Pending Review'),
(173, 73, 98,73,'12 Little Known Facts About CSIT314','Blessed are the meek: for they shall inherit the earth.','Accepted'),
(174, 74, 99,74,'6 Ultimate Facts About CSIT314','Blessed are they which do hunger and thirst after righteousness: for they shall be filled.','Accepted'),
(175, 75, 100,75,'Top 13 CSIT314 Ways You Need To Know About','Blessed are the merciful: for they shall obtain mercy.','Accepted'),
(176, 51, 76,76,'CSIT314 project Resolved In Just 25 Steps','Blessed are the pure in heart: for they shall see God.','Pending Review'),
(177, 52, 77,77,'Top 11 Things Behind CSIT314','Blessed are the peacemakers: for they shall be called the children of God.','Pending Review'),
(178, 53, 78,78,'8 Mistakes Most Jiahaos Often Commit (And How To Avoid Them)','outlook not so good','Rejected'),
(179, 54, 79,79,'Amazing CSIT314 Tricks For 2022','Blessed are they which are persecuted for righteousness sake: for theirs is the kingdom of heaven.','Accepted'),
(180, 55, 80,80,'What Is CSIT314? 5 Weird Hacks About CSIT314','I have a dream that one day down in Alabama, with its vicious racists, with its governor having his lips dripping with the words of interposition and nullification - one day right there in Alabama little black boys and black girls will be able to join hands with little white boys and white girls as sisters and brothers.','Accepted'),
(181, 56, 81,81,'7 Reasons Why bank account Is Going To Be BIG In 2022','I have a dream that one day every valley shall be exalted, and every hill and mountain shall be made low, the rough places will be made plain, and the crooked places will be made straight, and the glory of the Lord shall be revealed and all flesh shall see it together.','Accepted'),
(182, 57, 82,82,'11 Ways You Can Master your mind','This is our hope. This is the faith that I go back to the South with. With this faith we will be able to hew out of the mountain of despair a stone of hope.','Accepted'),
(183, 58, 83,83,'Best 10 school Tactics For 2022','With this faith we will be able to transform the jangling discords of our nation into a beautiful symphony of brotherhood.','Accepted'),
(184, 59, 84,84,'Best 10 office Tactics For 2022','With this faith we will be able to work together, to pray together, to struggle together, to go to jail together, to stand up for freedom together, knowing that we will be free one day.','Accepted'),
(185, 60, 85,85,'Best 10 airpot Tactics For 2022','This will be the day, this will be the day when all of Gods children will be able to sing with new meaning "My country tis of thee, sweet land of liberty, of thee I sing. Land where my fathers died, land of the Pilgrims pride, from every mountainside, let freedom ring!"','Accepted'),
(186, 61, 86,86,'Best 10 house Tactics For 2022','Four score and seven years ago our fathers brought forth on this continent, a new nation, conceived in liberty, and dedicated to the proposition that all men are created equal.','Accepted'),
(187, 62, 87,87,'Best 10 computer Tactics For 2022','Now we are engaged in a great civil war, testing whether that nation, or any nation so conceived and so dedicated, can long endure.','Accepted'),
(188, 63, 88,88,'Best 10 CSIT314 Tactics For 2022','We are met on a great battlefield of that war. We have come to dedicate a portion of that field, as a final resting place for those who here gave their lives that that nation might live.','Accepted'),
(189, 64, 89,89,'Best 10 CSCI262 Tactics For 2022','But in a larger sense, we cannot dedicate - we cannot consecrate - we cannot hallow - this ground. The brave men, living and dead, who struggled here, have consecrated it, far above our poor power to add or detract.','Accepted'),
(190, 65, 90,90,'Best 10 project Tactics For 2022','The world will little note, nor long remember, what we say here, but it can never forget what they did here.','Accepted'),
(191, 66, 91,91,'Best 10 studying Tactics For 2022','It is for us the living, rather, to be dedicated here to the unfinished work which they who fought here have thus far so nobly advanced.','Accepted'),
(192, 67, 92,92,'Best 10 gaming Tactics For 2022','It is rather for us to be here dedicated to the great task remaining before us - that from these honored dead we take increased devotion to that cause for which they gave the last full measure of devotion - that we here highly resolve that these dead shall not have died in vain - that this nation, under God, shall have a new birth of freedom - and that government of the people, by the people, for the people, shall not perish from the earth.','Accepted'),
(193, 68, 93,93,'Best 10 maths Tactics For 2022','Let the man of learning, the man of lettered leisure, beware of that queer and cheap temptation to pose to himself and to others as a cynic','Accepted'),
(194, 69, 94,94,'Best 10 english Tactics For 2022','The poorest way to face life is to face it with a sneer. ','Pending Review'),
(195, 70, 95,95,'Best 10 science Tactics For 2022','There are many men who feel a kind of twister pride in cynicism; ','Pending Review'),
(196, 71, 96,96,'Best 10 biology Tactics For 2022','There is no more unhealthy being, no man less worthy of respect, than he who either really holds, or feigns to hold, an attitude of sneering disbelief toward all that is great and lofty, whether in achievement or in that noble effort which, even if it fails, comes to second achievement.','Accepted'),
(197, 72, 97,97,'Best 10 chemistry Tactics For 2022','A cynical habit of thought and speech, a readiness to criticise work which the critic himself never tries to perform, an intellectual aloofness which will not accept contact with lifes realities - all these are marks, not as the possessor would fain to think, of superiority but of weakness.','Accepted'),
(198, 73, 98,98,'Best 10 physics Tactics For 2022','It is not the critic who counts; not the man who points out how the strong man stumbles, or where the doer of deeds could have done them better.','Accepted'),
(199, 74, 99,99,'Best 10 chinese Tactics For 2022','The credit belongs to the man who is actually in the arena, whose face is marred by dust and sweat and blood; who strives valiantly; who errs, who comes short again and again, because there is no effort without error and shortcoming; but who does actually strive to do the deeds; who knows great enthusiasms, the great devotions; who spends himself in a worthy cause; who at the best knows in the end the triumph of high achievement, and who at the worst, if he fails, at least fails while daring greatly, so that his place shall never be with those cold and timid souls who neither know victory nor defeat.','Accepted'),
(200, 75, 100,100,'Best 10 kitchen Tactics For 2022', 'I say to the House as I said to ministers who have joined this government, I have nothing to offer but blood, toil, tears, and sweat.','Accepted');


-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewer_id` int(11) UNSIGNED NOT NULL,
  `review_id` int(11) UNSIGNED DEFAULT NULL,
  `comment_id` int(11) UNSIGNED DEFAULT NULL,
  `bid_id` int(11) UNSIGNED DEFAULT NULL,
  `assign_paper_id` int(11) UNSIGNED DEFAULT NULL,
  `reviewer_workload` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `reviewer` (`reviewer_id`, `review_id`,`comment_id`, `bid_id`, `assign_paper_id`, `reviewer_workload`) VALUES
(76, 1, 1, 1, 101, 1),
(77, 2, 2, 2, 102, 2),
(78, 3, 3, 3, 103, 3),
(79, 4, 4, 4, 104, 4),
(80, 5, 5, 5, 105, 5),
(81, 6, 6, 6, 106, 6),
(82, 7, 7, 7, 107, 7),
(83, 8, 8, 8, 108, 8),
(84, 9, 9, 9, 109, 9),
(85, 10, 10,10,110, 10),
(86, 11, 11,11,111, 1),
(87, 12, 12,12,112, 2),
(88, 13, 13,13,113, 3),
(89, 14, 14,14,114, 4),
(90, 15, 15,15,115, 5),
(91, 16, 16,16,116, 6),
(92, 17, 17,17,117, 7),
(93, 18, 18,18,118, 8),
(94, 19, 19,19,119, 9),
(95, 20, 20,20,120, 10),
(96, 21, 21,21,121, 1),
(97, 22, 22,22,122, 2),
(98, 23, 23,23,123, 3),
(99, 24, 24,24,124, 4),
(100, 25, 25,25,125, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(11) UNSIGNED DEFAULT NULL,
  `author_rating` int(1) DEFAULT NULL,
  `reviewer_rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `reviews` (`review_id`, `comment_id`, `author_rating`, `reviewer_rating`) VALUES
(1, 1, -3, 1),
(2, 2, -2,-2),
(3, 3, -3, 1),
(4, 4,  3, 3),
(5, 5,  3, 3),
(6, 6,  1, 1),
(7, 7,  1, 1),
(8, 8,  1, 1),
(9, 9,  3, 3),
(10,10, 3, 3),
(11,11,-1, 2),
(12,12,-2, 1),
(13,13, 3, 3),
(14,14, 3, 3),
(15,15, 1,-2),
(16,16,-2, 1),
(17,17, 3, 3),
(18,18, 3, 3),
(19,19, 1, 2),
(20,20,-2, 1),
(21,21, 3, 3),
(22,22, 3, 3),
(23,23, 1, 2),
(24,24, 2, 1),
(25,25, 3, 3),
(26,26, 3, 3),
(27,27, 1, 2),
(28,28, 2, 1),
(29,29, 3, 3),
(30,30, 3, 3),
(31,31, 1, 2),
(32,32, 2, 1),
(33,33, 3, 3),
(34,34, 3, 3),
(35,35, 1, 2),
(36,36, 2, 1),
(37,37, 3, 3),
(38,38,-3,-3),
(39,39, 1, 2),
(40,40, 2, 1),
(41,41, 3, 3),
(42,42,-3,-3),
(43,43, 1, 2),
(44,44, 2, 1),
(45,45, 3, 3),
(46,46, 3, 3),
(47,47, 1, 2),
(48,48, 2, 1),
(49,49, 3, 3),
(50,50,-3,-3),
(51,51, 1, 2),
(52,52, 2, 1),
(53,53, 3, 3),
(54,54, 3, 3),
(55,55, 1, 2),
(56,56, 2, 1),
(57,57, 3, 3),
(58,58, 3, 3),
(59,59, 1, 2),
(60,60, 2, 1),
(61,61, 3, 3),
(62,62, 3, 3),
(63,63, 1, 2),
(64,64, 2, 1),
(65,65, 3, 3),
(66,66,-3,-3),
(67,67, 1, 2),
(68,68, 2, 1),
(69,69, 3, 3),
(70,70, 3, 3),
(71,71, 1, 2),
(72,72, 2, 1),
(73,73, 3, 3),
(74,74, 3, 3),
(75,75, 1, 2),
(76,76, 2, 1),
(77,77, 3, 3),
(78,78, 3, 3),
(79,79, 1, 2),
(80,80, 2, 1),
(81,81, 3, 3),
(82,82, 3, 3),
(83,83, 1, 2),
(84,84, 2, 1),
(85,85, 3, 3),
(86,86, 3, 3),
(87,87, 1, 2),
(88,88, 2, 1),
(89,89, 3, 3),
(90,90, 3, 3),
(91,91, 1, 2),
(92,92, 2, 1),
(93,93, 3, 3),
(94,94, 3, 3),
(95,95, 1, 2),
(96,96, 2, 1),
(97,97, 3, 3),
(98,98, 3, 3),
(99,99, 1, 2),
(100,100,2,1);
-- --------------------------------------------------------

--
-- Table structure for table `system_administrator`
--

CREATE TABLE `system_administrator` (
  `admin_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `system_administrator` (`admin_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25);



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `user_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `full_name`, `password`, `role`, `user_status`) VALUES
(	1	,	'BITRA@test.com'	,	'Kenneth Denise'	,	'KDCJVY50'	,	'System Administrator'	,	'Active'	)	,
(	2	,	'JWVWJ@test.com'	,	'Alex Quartz'	,	'NGZFPN38'	,	'System Administrator'	,	'Suspended'	)	,
(	3	,	'CZRFQ@test.com'	,	'Quartz Grace'	,	'IZRLKG38'	,	'System Administrator'	,	'Active'	)	,
(	4	,	'KGDSO@test.com'	,	'Wally Red'	,	'JDJIYF74'	,	'System Administrator'	,	'Active'	)	,
(	5	,	'SHAFJ@test.com'	,	'Quartz Alex'	,	'PEEBNJ87'	,	'System Administrator'	,	'Active'	)	,
(	6	,	'ZMPBA@test.com'	,	'Denise Red'	,	'PLZCND14'	,	'System Administrator'	,	'Active'	)	,
(	7	,	'BMUMM@test.com'	,	'Benny Jane'	,	'FSLDRT83'	,	'System Administrator'	,	'Active'	)	,
(	8	,	'TAWCZ@test.com'	,	'Eric Freddy'	,	'RVZHKD68'	,	'System Administrator'	,	'Active'	)	,
(	9	,	'KMYXA@test.com'	,	'Yames Wally'	,	'DBWTDW89'	,	'System Administrator'	,	'Active'	)	,
(	10	,	'JJFWI@test.com'	,	'NeganManny'	,	'EUXCCZ57'	,	'System Administrator'	,	'Active'	)	,
(	11	,	'ZKZIF@test.com'	,	'Quartz Yames'	,	'GOVFIK33'	,	'System Administrator'	,	'Active'	)	,
(	12	,	'APNBW@test.com'	,	'Freddy Charles'	,	'OYLBYX11'	,	'System Administrator'	,	'Active'	)	,
(	13	,	'BFNAG@test.com'	,	'Lewis Alex'	,	'LQWBKW30'	,	'System Administrator'	,	'Active'	)	,
(	14	,	'GVVYU@test.com'	,	'Iona Charles'	,	'WOCHSD78'	,	'System Administrator'	,	'Active'	)	,
(	15	,	'PRESJ@test.com'	,	'Iona Penny'	,	'YPWWLQ62'	,	'System Administrator'	,	'Active'	)	,
(	16	,	'KHFYK@test.com'	,	'Benny Charles'	,	'EIKMFN46'	,	'System Administrator'	,	'Active'	)	,
(	17	,	'BIPOJ@test.com'	,	'Vance Yames'	,	'XURKHY62'	,	'System Administrator'	,	'Active'	)	,
(	18	,	'HYBBE@test.com'	,	'Ace Quartz'	,	'VAUZHV95'	,	'System Administrator'	,	'Active'	)	,
(	19	,	'IBDQT@test.com'	,	'Uri Charles'	,	'IYBGJQ34'	,	'System Administrator'	,	'Active'	)	,
(	20	,	'UEXJL@test.com'	,	'Wally Grace'	,	'BVNBYU82'	,	'System Administrator'	,	'Active'	)	,
(	21	,	'SOAEM@test.com'	,	'Wally Freddy'	,	'MVLDPR73'	,	'System Administrator'	,	'Active'	)	,
(	22	,	'EWFAH@test.com'	,	'Uri Quartz'	,	'LBQFWW96'	,	'System Administrator'	,	'Active'	)	,
(	23	,	'PWZSM@test.com'	,	'Alice Vance'	,	'DPGXHD56'	,	'System Administrator'	,	'Active'	)	,
(	24	,	'XLLIR@test.com'	,	'Kenneth Freddy'	,	'ZITGTS83'	,	'System Administrator'	,	'Active'	)	,
(	25	,	'EWXVD@test.com'	,	'Helen Yames'	,	'IAWDNT59'	,	'System Administrator'	,	'Active'	)	,
(	26	,	'EAZZI@test.com'	,	'Alex Wally'	,	'MKNSEW95'	,	'Conference Chairman'	,	'Active'	)	,
(	27	,	'YIZEA@test.com'	,	'Lewis Freddy'	,	'JOKGSF45'	,	'Conference Chairman'	,	'Active'	)	,
(	28	,	'TRHJD@test.com'	,	'Negan Lewis'	,	'NRGNSO66'	,	'Conference Chairman'	,	'Active'	)	,
(	29	,	'IJSXV@test.com'	,	'Alex Manny'	,	'UCUBTK62'	,	'Conference Chairman'	,	'Active'	)	,
(	30	,	'OCPUO@test.com'	,	'Ace Wally'	,	'AGYJWQ70'	,	'Conference Chairman'	,	'Active'	)	,
(	31	,	'BYRMG@test.com'	,	'Jane Vance'	,	'QNLVGA70'	,	'Conference Chairman'	,	'Active'	)	,
(	32	,	'AGRYC@test.com'	,	'Quartz Alex'	,	'WWBLXT10'	,	'Conference Chairman'	,	'Active'	)	,
(	33	,	'OGYGH@test.com'	,	'Helen Benny'	,	'SISRXG51'	,	'Conference Chairman'	,	'Active'	)	,
(	34	,	'QZUYG@test.com'	,	'Eric Manny'	,	'OGYQUZ90'	,	'Conference Chairman'	,	'Active'	)	,
(	35	,	'AUQBY@test.com'	,	'Oran Lewis'	,	'LZKPDR72'	,	'Conference Chairman'	,	'Active'	)	,
(	36	,	'ZKYSM@test.com'	,	'Uri Alex'	,	'SXKPKE50'	,	'Conference Chairman'	,	'Active'	)	,
(	37	,	'DCPRK@test.com'	,	'Oran Alex'	,	'AIIAID86'	,	'Conference Chairman'	,	'Active'	)	,
(	38	,	'AUYFH@test.com'	,	'Freddy Sven'	,	'SGBSFX84'	,	'Conference Chairman'	,	'Active'	)	,
(	39	,	'MNQHX@test.com'	,	'Eric Benny'	,	'KGMFVN33'	,	'Conference Chairman'	,	'Active'	)	,
(	40	,	'PMCEF@test.com'	,	'Kenneth Charles'	,	'LJMQCY59'	,	'Conference Chairman'	,	'Active'	)	,
(	41	,	'LWWLN@test.com'	,	'Ace Yames'	,	'GAOKGP38'	,	'Conference Chairman'	,	'Active'	)	,
(	42	,	'EIJQC@test.com'	,	'Charles Eric'	,	'VFFYBK81'	,	'Conference Chairman'	,	'Active'	)	,
(	43	,	'ZIUXE@test.com'	,	'Penny Wally'	,	'RSJBIE94'	,	'Conference Chairman'	,	'Active'	)	,
(	44	,	'BZGHJ@test.com'	,	'Uri Sven'	,	'LPKYZE89'	,	'Conference Chairman'	,	'Active'	)	,
(	45	,	'DYXDI@test.com'	,	'Charles Eric'	,	'SPIVSU82'	,	'Conference Chairman'	,	'Active'	)	,
(	46	,	'MDBAC@test.com'	,	'Tony Red'	,	'JDGKNS61'	,	'Conference Chairman'	,	'Active'	)	,
(	47	,	'IBMDM@test.com'	,	'Yames Kenneth'	,	'MCMQNW17'	,	'Conference Chairman'	,	'Active'	)	,
(	48	,	'CBCVQ@test.com'	,	'Denise Grace'	,	'OYHPPC62'	,	'Conference Chairman'	,	'Active'	)	,
(	49	,	'KHGYR@test.com'	,	'Lewis Benny'	,	'MYPBGW72'	,	'Conference Chairman'	,	'Active'	)	,
(	50	,	'AJSKX@test.com'	,	'Iona Alex'	,	'SVUIBA86'	,	'Conference Chairman'	,	'Active'	)	,
(	51	,	'CHMYV@test.com'	,	'Eric Charles'	,	'NBQSMS49'	,	'Author'	,	'Active'	)	,
(	52	,	'ILKJI@test.com'	,	'Kenneth Penny'	,	'HLAVWZ45'	,	'Author'	,	'Active'	)	,
(	53	,	'JEHUC@test.com'	,	'Red Penny'	,	'CBLDRT84'	,	'Author'	,	'Active'	)	,
(	54	,	'XBMCB@test.com'	,	'Penny Wally'	,	'FCSCQY81'	,	'Author'	,	'Active'	)	,
(	55	,	'PRTUS@test.com'	,	'Alice Grace'	,	'QHDSJO55'	,	'Author'	,	'Active'	)	,
(	56	,	'XBCNF@test.com'	,	'Lewis Manny'	,	'ZYRHTR59'	,	'Author'	,	'Active'	)	,
(	57	,	'GBUVX@test.com'	,	'Quartz Vance'	,	'MWHROZ24'	,	'Author'	,	'Active'	)	,
(	58	,	'RLEXB@test.com'	,	'Vance Ace'	,	'VDVPSU55'	,	'Author'	,	'Active'	)	,
(	59	,	'KYOEB@test.com'	,	'Alex Iona'	,	'BSKQKD28'	,	'Author'	,	'Active'	)	,
(	60	,	'BTDVC@test.com'	,	'Vance Charles'	,	'OJUPKR39'	,	'Author'	,	'Active'	)	,
(	61	,	'WOAMM@test.com'	,	'Alex Negan'	,	'LSKGCG19'	,	'Author'	,	'Active'	)	,
(	62	,	'UIPMS@test.com'	,	'Kenneth Yames'	,	'WEUFCE42'	,	'Author'	,	'Active'	)	,
(	63	,	'ZKSMI@test.com'	,	'Grace Negan'	,	'NTVMIB59'	,	'Author'	,	'Active'	)	,
(	64	,	'WGHAH@test.com'	,	'Jane Charles'	,	'MMAQNM85'	,	'Author'	,	'Active'	)	,
(	65	,	'EXAFX@test.com'	,	'Freddy Sven'	,	'GQNVHA73'	,	'Author'	,	'Active'	)	,
(	66	,	'TVMQY@test.com'	,	'Uri Oran'	,	'VDAVRB75'	,	'Author'	,	'Active'	)	,
(	67	,	'IBBPH@test.com'	,	'Negan Denise'	,	'XWAAJK46'	,	'Author'	,	'Active'	)	,
(	68	,	'YXHRL@test.com'	,	'Alex Negan'	,	'RRQYEY27'	,	'Author'	,	'Active'	)	,
(	69	,	'KKKOS@test.com'	,	'Quartz Quartz'	,	'FHSHNI53'	,	'Author'	,	'Active'	)	,
(	70	,	'WIBBI@test.com'	,	'Helen Penny'	,	'GEKHRI99'	,	'Author'	,	'Active'	)	,
(	71	,	'BTAAU@test.com'	,	'Yames Helen'	,	'HVYTFQ17'	,	'Author'	,	'Active'	)	,
(	72	,	'LKVJH@test.com'	,	'Ace Wally'	,	'DZNHTW34'	,	'Author'	,	'Active'	)	,
(	73	,	'DVDQV@test.com'	,	'Negan Tony'	,	'AOLHWY83'	,	'Author'	,	'Active'	)	,
(	74	,	'LBMUU@test.com'	,	'Iona Red'	,	'KKUSVE15'	,	'Author'	,	'Active'	)	,
(	75	,	'CHFPZ@test.com'	,	'Iona Eric'	,	'MYNMLJ12'	,	'Author'	,	'Active'	)	,
(	76	,	'ATMMY@test.com'	,	'Lewis Uri'	,	'MBTGUL43'	,	'Reviewer'	,	'Active'	)	,
(	77	,	'PJKJI@test.com'	,	'Jane Charles'	,	'TIRDFH74'	,	'Reviewer'	,	'Active'	)	,
(	78	,	'NGLXM@test.com'	,	'Negan Tony'	,	'EVOKEG51'	,	'Reviewer'	,	'Active'	)	,
(	79	,	'CMGCE@test.com'	,	'Lewis Penny'	,	'IOGCXF99'	,	'Reviewer'	,	'Active'	)	,
(	80	,	'WHANI@test.com'	,	'Vance Penny'	,	'AUZNCA79'	,	'Reviewer'	,	'Active'	)	,
(	81	,	'MKNYH@test.com'	,	'Yames Wally'	,	'JFXUVD46'	,	'Reviewer'	,	'Active'	)	,
(	82	,	'AXFEY@test.com'	,	'Tony Denise'	,	'HBKJXP79'	,	'Reviewer'	,	'Active'	)	,
(	83	,	'CLDZA@test.com'	,	'Ace Quartz'	,	'VUMXFC47'	,	'Reviewer'	,	'Active'	)	,
(	84	,	'UIINZ@test.com'	,	'Penny Quartz'	,	'BVYUEG34'	,	'Reviewer'	,	'Active'	)	,
(	85	,	'WYEQO@test.com'	,	'Charles Freddy'	,	'IAQQIR18'	,	'Reviewer'	,	'Active'	)	,
(	86	,	'MNHSK@test.com'	,	'Benny Iona'	,	'JPJNNK13'	,	'Reviewer'	,	'Active'	)	,
(	87	,	'JTRSI@test.com'	,	'Freddy Vance'	,	'HONHFI36'	,	'Reviewer'	,	'Active'	)	,
(	88	,	'YWPGE@test.com'	,	'Vance Penny'	,	'YYAIFC77'	,	'Reviewer'	,	'Active'	)	,
(	89	,	'JYLLS@test.com'	,	'Uri Alice'	,	'LLJJCB59'	,	'Reviewer'	,	'Active'	)	,
(	90	,	'XZJXS@test.com'	,	'Negan Uri'	,	'OKVMEQ42'	,	'Reviewer'	,	'Active'	)	,
(	91	,	'DOPXB@test.com'	,	'Manny Lewis'	,	'YPCBEN19'	,	'Reviewer'	,	'Active'	)	,
(	92	,	'UMJVC@test.com'	,	'Charles Charles'	,	'OGABID19'	,	'Reviewer'	,	'Active'	)	,
(	93	,	'IHUMA@test.com'	,	'Jane Benny'	,	'HRAFUQ47'	,	'Reviewer'	,	'Active'	)	,
(	94	,	'IEMZD@test.com'	,	'Jane Uri'	,	'KFZKLA49'	,	'Reviewer'	,	'Active'	)	,
(	95	,	'WQJDS@test.com'	,	'Tony Helen'	,	'HOJTXT55'	,	'Reviewer'	,	'Active'	)	,
(	96	,	'MPZJV@test.com'	,	'Penny Kenneth'	,	'KUNBIC41'	,	'Reviewer'	,	'Active'	)	,
(	97	,	'ZNJXS@test.com'	,	'Oran Oran'	,	'QPBPFM35'	,	'Reviewer'	,	'Active'	)	,
(	98	,	'JLFSE@test.com'	,	'Charles Grace'	,	'YWTNWP48'	,	'Reviewer'	,	'Active'	)	,
(	99	,	'VVRDK@test.com'	,	'Oran Jane'	,	'PUITTL91'	,	'Reviewer'	,	'Active'	)	,
(	100	,	'ZAZNU@test.com'	,	'Yames Charles'	,	'XLFSTJ13'	,	'Reviewer'	,	'Active'	);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `paper_id` (`paper_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_id` (`commenter_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `conference_chairman`
--
ALTER TABLE `conference_chairman`
  ADD PRIMARY KEY (`chairman_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `reviewer_id` (`reviewer_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `bid_id` (`bid_id`),
  ADD KEY `assign_paper_id` (`assign_paper_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `system_administrator`
--
ALTER TABLE `system_administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `paper_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`paper_id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `reviewer` (`reviewer_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`commenter_id`) REFERENCES `reviewer` (`reviewer_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`);

--
-- Constraints for table `conference_chairman`
--
ALTER TABLE `conference_chairman`
  ADD CONSTRAINT `conference_chairman_ibfk_1` FOREIGN KEY (`chairman_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `papers_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `reviewer` (`reviewer_id`),
  ADD CONSTRAINT `papers_ibfk_3` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`);

--
-- Constraints for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `reviewer_ibfk_1` FOREIGN KEY (`reviewer_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `reviewer_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`),
  ADD CONSTRAINT `reviewer_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`),
  ADD CONSTRAINT `reviewer_ibfk_4` FOREIGN KEY (`bid_id`) REFERENCES `bids` (`bid_id`),
  ADD CONSTRAINT `reviewer_ibfk_5` FOREIGN KEY (`assign_paper_id`) REFERENCES `papers` (`paper_id`),
  ADD CONSTRAINT `reviewer_ibfk_6` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`),
  ADD CONSTRAINT `reviewer_ibfk_7` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`);

--
-- Constraints for table `system_administrator`
--
ALTER TABLE `system_administrator`
  ADD CONSTRAINT `system_administrator_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
