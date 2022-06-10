-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2020 at 06:39 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newssite-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int NOT NULL,
  `article_cat_id` int NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_author` varchar(255) NOT NULL,
  `article_date` date NOT NULL,
  `article_image` text NOT NULL,
  `article_image_src` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_tags` varchar(255) NOT NULL,
  `article_comment_count` int NOT NULL DEFAULT '0',
  `article_status` varchar(255) NOT NULL DEFAULT 'draft',
  `jumbotron` tinyint(1) NOT NULL DEFAULT '0',
  `isfeat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_cat_id`, `article_title`, `article_author`, `article_date`, `article_image`, `article_image_src`, `article_content`, `article_tags`, `article_comment_count`, `article_status`, `jumbotron`, `isfeat`) VALUES
(1, 1, 'Ethiopia army accuses WHO boss Dr Tedros of supporting Tigray leader', 'The Utopia Times', '2020-12-01', '_111119993_hi060199138.jpg', 'AFP | Dr Tedros has not yet commented on the accusation', 'Ethiopia\'s army chief has accused the head of the World Health Organization of procuring weapons for the Tigray People\'s Liberation Front (TPLF), which is fighting federal troops.\r\n\r\nHundreds have died in the conflict in Tigray since the beginning of November.\r\n\r\nDr Tedros Adhanom Ghebreyesus is Tigrayan and was health minister in a previous Ethiopian government, which was led by the TPLF.\r\n\r\nHe has not yet responded to the BBC\'s request for comment.\r\n\r\nGen Berhanu Jula said in a press conference that Dr Tedros had \"left no stone unturned\" to support the TPLF and help get them weapons but did not provide any evidence to support his allegations.\r\n\r\n\"We don\'t expect him to stand on the side of Ethiopians and condemn these people. He has been doing everything to support them, he has campaigned for neighbouring countries to condemn the war,\" said Gen Berhanu.\r\n\r\n\"He has worked for them to get weapons.\"\r\n\r\nAfter being voted in as the head of the WHO in 2017, Dr Tedros became well known at the beginning of the coronavirus pandemic and is now arguably the highest-profile Tigrayan abroad.\r\n\r\nMeanwhile, US President-elect Joe Biden\'s foreign policy aide has appealed for both sides to end the fighting.\r\n\r\n\"Deeply concerned about the humanitarian crisis in Ethiopia, reports of targeted ethnic violence, and the risk to regional peace and security,\" Antony Blinken tweeted.\r\n\r\nThe UN\'s refugee agency warns that a full-scale humanitarian crisis is unfolding.\r\n\r\nMore than 30,000 people have crossed the border from Ethiopia into Sudan.\r\n\r\nEthiopian refugees who fled intense fighting in their homeland of Tigray, cook their meal in the border reception centre of Hamdiyet, in the eastern Sudanese state of Kasala, on November 14, 2020. - Ethiopia\'s Prime Minister Abiy Ahmed, winner of last year\'s Nobel Peace Prize, ordered military operations in Tigray last week, shocking the international community which fears the start of a long and bloody civil war.\r\n\r\nThousands of civilians are continuing to flee across the border, the UN Refugee Agency\'s representative for Sudan, Axel Bisschop told the BBC\'s Newsday programme.\r\n\r\n\"I spoke to a banker, some teachers, health workers, and they all say that it was too dangerous to be there... and they left by foot,\" he said.\r\n\r\nWhat\'s the conflict about?\r\nThe TPLF dominated Ethiopia\'s military and politics for decades before Abiy Ahmed became prime minister in 2018.\r\n\r\nHe pushed through major reforms which some say sidelined the TPLF.\r\n\r\nThe feud escalated in September when Tigray held a regional election, defying a nationwide ban on all polls imposed because of the coronavirus pandemic.\r\n\r\nMr Abiy called the vote illegal.\r\n\r\nThen fighting broke out on 4 November after Ethiopia\'s central government accused the TPLF of attacking a military base to steal weapons.\r\n\r\nThe TPLF has denied the attack.', 'World, WHO, Health', 0, 'published', 0, 1),
(3, 1, 'Covid vaccine: Pfizer to apply for authorisation in US', 'The Utopia Times', '2020-12-01', '_115547701_gettyimages-1229654243.jpg', 'GETTY IMAGES', 'Pfizer and its partner BioNTech have said they will apply for emergency authorisation in the US for their Covid-19 vaccine on Friday.\r\n\r\nIt will be the job of the US Food and Drug Administration (FDA) to decide if the vaccine is safe to roll out.\r\n\r\nIt is not clear how long the FDA will take to study the data. However, the US government expects to approve the vaccine in the first half of December.\r\n\r\nData from an advanced trial showed the vaccine protects 94% of adults over 65.\r\n\r\nThe trial involved 41,000 people worldwide. Half were given the vaccine, and half a placebo.\r\n\r\nThe UK has pre-ordered 40 million doses and should get 10 million by the end of the year.\r\n\r\nWill there be more than one coronavirus vaccine?\r\nIs the vaccine safe to take? And other questions\r\nLast week, Pfizer and BioNTech published preliminary data suggesting the vaccine offered 90% protection against Covid-19 and said there were no safety concerns. Subsequent data released on Wednesday suggested 95% effectiveness.\r\n\r\nThis was followed by data on a vaccine made by US company Moderna suggesting nearly 95% protection and similarly promising results from trials of another developed in Russia, called Sputnik.\r\n\r\n\r\nmedia captionCoronavirus vaccine: How close are you to getting one?\r\nProf Stephen Evans, professor of pharmacoepidemiology at the London School of Hygiene & Tropical Medicine (LSHTM), said both the FDA and the European Medicines Agency (EMA) would need to approve the Pfizer data.\r\n\r\n\"We can expect both agencies to conduct a very careful evaluation and we can rely on their conclusions,\" he said.\r\n\r\nBut BBC health correspondent Naomi Grimley says this vaccine is still a long way off widespread use as regulators need to be absolutely sure that it\'s safe - not least because Moderna and Pfizer both use an experimental technology that has never been approved before.\r\n\r\n', 'World, Vaccine, Coronavirus, COVID-19, US', 0, 'published', 1, 1),
(4, 2, 'UK\'s National Cyber Force comes out of the shadows', 'Gordon Corera', '2020-11-20', '_115576083_cyber.jpg', 'GETTY IMAGES', 'The National Cyber Force\'s existence has been publicly confirmed after months of speculation and a decade after the UK first began offensive cyber-operations.\r\n\r\nIt will counter threats from terrorists, criminals and hostile states.\r\n\r\nMI6 officers will work alongside both the cyber-spy agency GCHQ and the military as part of a new unified command.\r\n\r\nIt has been up and running since April.\r\n\r\nBut it was only formally made public by the prime minister on Thursday.\r\n\r\nThe aim is that when UK armed forces go into combat, cyber-operations will be closely integrated with the traditional military.\r\n\r\nOne possible scenario would see operators hacking into enemy air defences to protect RAF missions.\r\n\r\nBut the force is not just about a high-end military capability.\r\n\r\nIt has been designed to operate day-to-day against wider threats.\r\n\r\n<h3>Surprise and ambiguity</h3>\r\nThe NCF\'s operational mission is to degrade, disrupt and even destroy communications systems used by people posing a threat to the UK.\r\n\r\nThis might involve interfering with a suspect\'s mobile phone to prevent them communicating with their contacts.\r\n\r\nOr it could see a cyber-crime group\'s computer servers being disrupted to prevent a threat like 2017\'s WannaCry attack, which took down parts of the NHS and other organisations by scrambling their data.\r\n\r\nSurprise and ambiguity can be advantageous, so officials are cautious about providing too many details.\r\n\r\nBut one tactic will be to communicate with attackers to undermine their morale and dissuade them.\r\n\r\n<h3>Battlefield support</h3>\r\nThe new operational command has been running since April, with its head briefed every week about ongoing operations for roughly 45 minutes .\r\n\r\nThe NCF is recruiting through existing members of the armed forces and from GCHQ, MI6 and also the Defence Science and Technology Laboratory.\r\n\r\nMI6 officers might be involved if activity is taking place overseas or to work on the human aspect of an operation.\r\n\r\nThe ambition is to grow the force to about 3,000 in the next decade.\r\n\r\nThe UK has been developing cyber-capabilities that can have a real-world impact for well over a decade. They were first used in Afghanistan and then against the Islamic State group in Iraq and Syria.\r\n\r\nIn 2018, GCHQ Director Jeremy Fleming talked of \"a major offensive cyber-campaign\" against IS, which suppressed its propaganda, hindered its ability to co-ordinate attacks, and protected coalition forces on the battlefield.\r\n\r\nOfficials will not say if the capability has been used against other states. But there have been reports of operations targeting Russia in the wake of the Skripal poisoning in 2018 and Covid-19 misinformation more recently.\r\n\r\n<h3>Blurred line</h3>\r\nThe birth of Cyber Force has not been entirely smooth.\r\n\r\nThere was a long and difficult battle between GCHQ and the Ministry of Defence over authority.\r\n\r\nIt has been agreed that the foreign secretary and defence secretary will have a role in signing off different types of operations.\r\n\r\nOther countries have deployed their own cyber-capabilities.\r\n\r\nRussia has been accused of carrying out a type of hybrid warfare using a range of tools, including cyber-attacks and information operations below the threshold of traditional armed conflict. In doing so it has blurred the old dividing line between war and peace.\r\n\r\nWestern nations have been slow to respond and reorganise themselves. But they are now seeking to fight on this new terrain with new weapons.\r\n\r\nThe US\'s Cyber Command is led by General Paul Nakasone. He has been operating under a strategy of \"persistent engagement\" and \"defend forward\", which involves battling with foreign actors in cyber-space.\r\n\r\nThey include Russia\'s Internet Research Agency, which targeted the US 2016 election.\r\n\r\n<h3>Ethical choices</h3>\r\nThe UK believes that in many areas it can match Russian capabilities, but act as a more \"responsible\" cyber-power.\r\n\r\nThat means being subject to external oversight as well as ministerial authorisation for more risky or novel operations.\r\n\r\nBut it may be tricky to set the ethical boundaries for how far the UK is willing to go.\r\n\r\nThe debate over when and how to go on the offensive with cyber-weapons has often lacked nuance. Those involved hope the public announcement will lead to a more informed debate.\r\n\r\nThe creation of the National Cyber Security Centre (NCSC) in 2016 as a public, defensive arm of GCHQ did help increase public engagement and understanding.\r\n\r\nIts former head Ciaran Martin recently revealed that when he started, understanding was so low that a senior figure in government asked him where the \"red button\" was to launch attacks.\r\n\r\nThat button may not literally exist, but it is now public that the National Cyber Force is the place where it would be.', 'Tech, Cyber Security', 0, 'published', 0, 0),
(5, 1, 'Mac mini and Apple Silicon M1 review: Not so crazy after all', 'SAMUEL AXON', '2020-11-28', 'Mac-mini-M1-1440x1080-wb-640x480.jpg', 'SAMUEL AXON', 'Apple claims that the M1 can achieve its strong performance in part because of its unified memory architecture (UMA), which allows the CPU and GPU to both easily access relevant data without having to slow things down by copying it around.\r\n\r\nWe’ll talk specific performance testing and results soon, but spoiler alert: the M1 is quite fast. That’s especially true for graphics compared to Intel’s graphics solutions (which seem unworthy to even be mentioned in the same category as what the M1 offers). These improvements are thanks to all of the above, plus techniques like tile-based deferred rendering and Apple’s proprietary Metal graphics API, which has been designed to take advantage of this architecture.\r\n\r\nThis has gotten less attention, but the M1 contains a bunch of other stuff besides the elephants-in-the-die that are the CPU, GPU, and NPU. It has the Secure Enclave, Apple’s encrypted tool for handling sensitive data on device. It has an image signal processor, which isn’t super relevant on the camera-less Mac mini, but it reportedly improves FaceTime camera quality on the laptops. The M1 also includes a storage controller and hardware for driving encryption, among other things.\r\n\r\nFURTHER READING\r\niMac Pro review: Working as intended\r\nIn 2017, Apple introduced the T2 chip on the iMac Pro, and it went to most other Macs over the next couple of years. The T2 handled security features and various other things like some of what we just listed above, and we speculated when it was first introduced that it might be a predecessor to Apple’s eventual Mac SoC plans.\r\nIt turns out we (and everyone else who picked up on that pretty obvious clue) were right. As such, the new M1 Macs don’t have T2 chips. It’s all on the M1 now.\r\n\r\nOf course, a change in architecture suggests all sorts of compatibility headaches with older software, to say the least. The M1 can’t natively run apps made for Intel-based Macs. But surprisingly, that ends up not really mattering in most cases. A lot of buyers of the M1 Macs will never even realize anything changed under the hood.\r\n\r\nTo explore that point, let’s go over the software the M1 does run.', 'Tech, Apple, Mac, Silicon, M1', 0, 'published', 0, 0),
(59, 3, 'A solar-powered rocket might be our ticket to interstellar space', 'Daniel Oberhaus', '2020-12-01', 'milky-way-radio-telescope-space.jpg', 'Getty Images', 'If Jason Benkoski is right, the path to interstellar space begins in a shipping container tucked behind a laboratory high bay in Maryland. The setup looks like something out of a low-budget sci-fi film: one wall of the container is lined with thousands of LEDs, an inscrutable metal trellis runs down the center, and a thick black curtain partially obscures the apparatus. This is the Johns Hopkins University Applied Physics Laboratory solar simulator, a tool that can shine with the intensity of 20 Suns. On Thursday afternoon, Benkoski mounted a small black-and-white tile onto the trellis and pulled a dark curtain around the setup before stepping out of the shipping container. Then he hit the light switch.\r\n\r\nOnce the solar simulator was blistering hot, Benkoski started pumping liquid helium through a small embedded tube that snaked across the slab. The helium absorbed heat from the LEDs as it wound through the channel and expanded until it was finally released through a small nozzle. It might not sound like much, but Benkoski and his team just demonstrated solar thermal propulsion, a previously theoretical type of rocket engine that is powered by the Sun’s heat. They think it could be the key to interstellar exploration.\r\n\r\n“It’s really easy for someone to dismiss the idea and say, ‘On the back of an envelope, it looks great, but if you actually build it, you\'re never going to get those theoretical numbers,’” says Benkoski, a materials scientist at the Applied Physics Laboratory and the leader of the team working on a solar thermal propulsion system. “What this is showing is that solar thermal propulsion is not just a fantasy. It could actually work.”\r\n\r\nOnly two spacecraft, Voyager 1 and Voyager 2, have left our Solar System. But that was a scientific bonus after they completed their main mission to explore Jupiter and Saturn. Neither spacecraft was equipped with the right instruments to study the boundary between our star’s planetary fiefdom and the rest of the universe. Plus, the Voyager twins are slow. Plodding along at 30,000 miles per hour, it took them nearly a half-century to escape the Sun’s influence.\r\n\r\nBut the data they have sent back from the edge is tantalizing. It showed that much of what physicists had predicted about the environment at the edge of the Solar System was wrong. Unsurprisingly, a large group of astrophysicists, cosmologists, and planetary scientists are clamoring for a dedicated interstellar probe to explore this new frontier.\r\n\r\nIn 2019, NASA tapped the Applied Physics Laboratory to study concepts for a dedicated interstellar mission. At the end of next year, the team will submit its research to the National Academies of Sciences, Engineering, and Medicine’s Heliophysics decadal survey, which determines Sun-related science priorities for the next 10 years. APL researchers working on the Interstellar Probe program are studying all aspects of the mission, from cost estimates to instrumentation. But simply figuring out how to get to interstellar space in any reasonable amount of time is by far the biggest and most important piece of the puzzle.\r\nDon’t pause at the heliopause\r\n\r\nThe edge of the Solar System—called the heliopause—is extremely far away. By the time a spacecraft reaches Pluto, it’s only a third of the way to interstellar space. And the APL team is studying a probe that would go three times farther than the edge of the Solar System, a journey of 50 billion miles, in about half the time it took the Voyager spacecraft just to reach the edge. To pull off that type of mission, they’ll need a probe unlike anything that’s ever been built. “We want to make a spacecraft that will go faster, further, and get closer to the Sun than anything has ever done before,” says Benkoski. “It’s like the hardest thing you could possibly do.”\r\n\r\nIn mid-November, the Interstellar Probe researchers met online for a weeklong conference to share updates as the study enters its final year. At the conference, teams from APL and NASA shared the results of their work on solar thermal propulsion, which they believe is the fastest way to get a probe into interstellar space. The idea is to power a rocket engine with heat from the Sun, rather than combustion. According to Benkoski’s calculations, this engine would be around three times more efficient than the best conventional chemical engines available today. “From a physics standpoint, it’s hard for me to imagine anything that’s going to beat solar thermal propulsion in terms of efficiency,” says Benkoski. “But can you keep it from exploding?”\r\n\r\nUnlike a conventional engine mounted on the aft end of a rocket, the solar thermal engine that the researchers are studying would be integrated with the spacecraft’s shield. The rigid flat shell is made from a black carbon foam with one side coated in a white reflective material. Externally, it would look very similar to the heat shield on the Parker Solar Probe. The critical difference is the tortuous pipeline hidden just beneath the surface. If the interstellar probe makes a close pass by the Sun and pushes hydrogen into its shield’s vasculature, the hydrogen will expand and explode from a nozzle at the end of the pipe. The heat shield will generate thrust.\r\n430,000mph\r\n\r\nIt’s simple in theory but incredibly hard in practice. A solar thermal rocket is only effective if it can pull off an Oberth maneuver, an orbital-mechanics hack that turns the Sun into a giant slingshot. The Sun’s gravity acts like a force multiplier that dramatically increases the craft’s speed if a spacecraft fires its engines as it loops around the star. The closer a spacecraft gets to the Sun during an Oberth maneuver, the faster it will go. In APL’s mission design, the interstellar probe would pass just a million miles from the Sun’s roiling surface.\r\n\r\nTo put this in perspective, by the time NASA’s Parker Solar Probe makes its closest approach in 2025, it will be within 4 million miles of the Sun’s surface and booking it at nearly 430,000 miles per hour. That’s about twice the speed the interstellar probe aims to hit, and the Parker Solar Probe built up speed with gravity assists from the Sun and Venus over the course of seven years. The Interstellar Probe will have to accelerate from around 30,000 miles per hour to around 200,000 miles per hour in a single shot around the Sun, which means getting close to the star. Really close.\r\n\r\nCozying up to a Sun-sized thermonuclear explosion creates all sorts of materials challenges, says Dean Cheikh, a materials technologist at NASA’s Jet Propulsion Laboratory who presented a case study on the solar thermal rocket during the recent conference. For the APL mission, the probe would spend around 2.5 hours in temperatures around 4,500 degrees Fahrenheit as it completed its Oberth maneuver. That’s more than hot enough to melt through the Parker Solar Probe’s heat shield, so Cheikh’s team at NASA found new materials that could be coated on the outside to reflect away thermal energy. Combined with the cooling effect of hydrogen flowing through channels in the heat shield, these coatings would keep the interstellar probe cool while it blitzed by the Sun. “You want to maximize the amount of energy that you’re kicking back,” says Cheikh. “Even small differences in material reflectivity start to heat up your spacecraft significantly.”\r\n“We don’t have a lot of options”\r\n\r\nA still greater problem is how to handle the hot hydrogen flowing through the channels. At extremely high temperatures, the hydrogen would eat right through the carbon-based core of the heat shield, which means the inside of the channels will have to be coated in a stronger material. The team identified a few materials that could do the job, but there’s just not a lot of data on their performance, especially extreme temperatures. “There’s not a lot of materials that can fill these demands,” says Cheikh. “In some ways that’s good, because we only have to look at these materials. But it’s also bad because we don’t have a lot of options.”\r\n\r\nThe big takeaway from his research, says Cheikh, is there’s a lot of testing that needs to be done on heat shield materials before a solar thermal rocket is sent around the Sun. But it’s not a deal-breaker. In fact, incredible advances in materials science make the idea finally seem feasible more than 60 years after it was first conceived by engineers in the US Air Force. “I thought I came up with this great idea independently, but people were talking about it in 1956,” says Benkoski. “Additive manufacturing is a key component of this, and we couldn’t do that 20 years ago. Now I can 3D-print metal in the lab.”\r\n\r\nEven if Benkoski wasn’t the first to float the idea of a solar thermal propulsion, he believes he’s the first to demonstrate a prototype engine. During his experiments with the channeled tile in the shipping container, Benkoski and his team showed that it was possible to generate thrust using sunlight to heat a gas as it passed through embedded ducts in a heat shield. These experiments had several limitations. They didn’t use the same materials or propellant that would be used on an actual mission, and the tests occurred at temperatures well below what an interstellar probe would experience. But the important thing, says Benkoski, is that the data from the low-temperature experiments matched the models that predict how an interstellar probe would perform on its actual mission once adjustments are made for the different materials. “We did it on a system that would never actually fly. And now the second step is we start to substitute each of these components with the stuff that you would put on a real spacecraft for an Oberth maneuver,” Benkoski says.\r\nA long way to go\r\n\r\nThe concept has a long way to go before it’s ready to be used on a mission—and with only a year left in the Interstellar Probe study, there’s not enough time to launch a small satellite to do experiments in low Earth orbit. But by the time Benkoski and his colleagues at APL submit their report next year, they will have generated a wealth of data that lays the foundation for in-space tests. There’s no guarantee that the National Academies will select the interstellar-probe concept as a top priority for the coming decade. But whenever we are ready to leave the Sun behind, there’s a good chance we’ll have to use it for a boost on our way out the door.', 'Science, Space, Solar Power, NASA', 0, 'published', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'World'),
(2, 'Tech'),
(3, 'Science'),
(4, 'Health'),
(5, 'Future'),
(6, 'Gaming & Culture');

-- --------------------------------------------------------

--
-- Table structure for table `commentsnew`
--

CREATE TABLE `commentsnew` (
  `comment_id` int NOT NULL,
  `comment_article_id` int NOT NULL,
  `comment_user_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'approved',
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentsnew`
--

INSERT INTO `commentsnew` (`comment_id`, `comment_article_id`, `comment_user_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 5, 'd@t.com', 'Fake News!', 'Unapproved', '2020-11-22'),
(2, 5, 'example@mail.com', 'This is a comment', 'approved', '2020-12-01'),
(3, 3, 'jha@jha.com', 'This is a comment', 'approved', '2020-12-01'),
(4, 59, 'jha@jha.com', 'This is an example', 'approved', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_password`, `first_name`, `last_name`, `user_email`, `user_role`) VALUES
(1, '$2y$10$Qy9Pv22zVxH7KVbAO8BMDu7TiheRVcYI4slDEh4Yi68uFXBq.gG0e', 'Shubham', 'Mhashelkar', 'example@mail.com', 'administrator'),
(6, '$2y$10$CpwyYLqiBMrpKUmFeDYDPesF/T0ByVUlLlRxcPGEvHVA8MzSvQKKm', 'Harish', 'Jha', 'jha@jha.com', 'user'),
(7, '$2y$10$Ta2cTj9FJ8.ISTO/IqguY.wmqrlP06F3K4SUUydsR6MLyroBLe7f6', 'Donald', 'Trump', 'd@t.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `commentsnew`
--
ALTER TABLE `commentsnew`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commentsnew`
--
ALTER TABLE `commentsnew`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
